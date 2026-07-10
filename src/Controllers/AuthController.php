<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Database;
use App\Models\User;

class AuthController extends Controller
{
    public function loginForm(): void
    {
        if (Auth::check()) {
            $this->redirect(Auth::isAdmin() ? '/admin' : '/account');
            return;
        }

        $this->view('front/login');
    }

    public function login(): void
    {
        if (Auth::check()) {
            $this->redirect(Auth::isAdmin() ? '/admin' : '/account');
            return;
        }

        $errors = $this->validate($_POST, [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $user = User::findByEmail($_POST['email']);
        if (!$user || !password_verify($_POST['password'], $user['password'])) {
            $this->withErrors(['email' => ['Invalid email or password']]);
            $this->withOld(['email' => $_POST['email']]);
            $this->redirectBack();
            return;
        }

        Auth::login($user['id'], $user);

        $redirect = \App\Core\Session::getFlash('redirect');
        if (!$redirect) {
            $redirect = Auth::isAdmin() ? '/admin' : '/account';
        }
        $this->redirect($redirect);
    }

    public function registerForm(): void
    {
        if (Auth::check()) {
            $this->redirect('/account');
            return;
        }

        $this->view('front/register');
    }

    public function register(): void
    {
        if (Auth::check()) {
            $this->redirect('/account');
            return;
        }

        $errors = $this->validate($_POST, [
            'name'                  => 'required|min:2|max:255',
            'email'                 => 'required|email',
            'password'              => 'required|min:6|max:255',
            'password_confirmation' => 'required|min:6',
        ]);

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        if ($_POST['password'] !== $_POST['password_confirmation']) {
            $this->withErrors(['password_confirmation' => ['Passwords do not match']]);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $existing = User::findByEmail($_POST['email']);
        if ($existing) {
            $this->withErrors(['email' => ['An account with this email already exists']]);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $userId = User::create([
            'name'     => $_POST['name'],
            'email'    => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
            'role'     => 'customer',
        ]);

        $user = User::find($userId);
        Auth::login($userId, $user);

        $this->withSuccess('Account created successfully!');
        $this->redirect('/account');
    }

    public function logout(): void
    {
        Auth::logout();
        $this->redirect('/');
    }
}
