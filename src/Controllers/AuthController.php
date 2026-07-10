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

        session_regenerate_id(true);
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
        session_regenerate_id(true);
        Auth::login($userId, $user);

        $this->withSuccess('Account created successfully!');
        $this->redirect('/account');
    }

    public function forgotPasswordForm(): void
    {
        if (Auth::check()) {
            $this->redirect('/account');
            return;
        }

        $this->view('front/forgot-password');
    }

    public function forgotPassword(): void
    {
        if (Auth::check()) {
            $this->redirect('/account');
            return;
        }

        $errors = $this->validate($_POST, [
            'email' => 'required|email',
        ]);

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $user = User::findByEmail($_POST['email']);
        if ($user) {
            $token = bin2hex(random_bytes(32));
            \App\Core\Database::query(
                "UPDATE users SET reset_token = :token, reset_token_expires = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE id = :id",
                ['token' => password_hash($token, PASSWORD_BCRYPT), 'id' => $user['id']]
            );

            $resetLink = url('reset-password?token=' . $token . '&email=' . urlencode($_POST['email']));
            $body = '<p>Hello ' . e($user['name']) . ',</p><p>Click <a href="' . $resetLink . '">here</a> to reset your password. This link expires in 1 hour.</p>';
            send_mail($_POST['email'], 'Password Reset - Rosaline', $body);
        }

        $this->withSuccess('If that email is registered, a password reset link has been sent.');
        $this->redirect('/login');
    }

    public function resetPasswordForm(): void
    {
        if (Auth::check()) {
            $this->redirect('/account');
            return;
        }

        $token = $_GET['token'] ?? '';
        $email = $_GET['email'] ?? '';

        if (empty($token) || empty($email)) {
            $this->withErrors(['_general' => ['Invalid password reset link.']]);
            $this->redirect('/login');
            return;
        }

        $this->view('front/reset-password', ['token' => $token, 'email' => $email]);
    }

    public function resetPassword(): void
    {
        if (Auth::check()) {
            $this->redirect('/account');
            return;
        }

        $errors = $this->validate($_POST, [
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|min:6|max:255',
            'password_confirmation' => 'required|min:6',
        ]);

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->redirectBack();
            return;
        }

        if ($_POST['password'] !== $_POST['password_confirmation']) {
            $this->withErrors(['password_confirmation' => ['Passwords do not match']]);
            $this->redirectBack();
            return;
        }

        $user = User::findByEmail($_POST['email']);
        if (!$user || empty($user['reset_token'])) {
            $this->withErrors(['_general' => ['Invalid password reset link.']]);
            $this->redirect('/login');
            return;
        }

        if (strtotime($user['reset_token_expires']) < time()) {
            $this->withErrors(['_general' => ['Password reset link has expired.']]);
            $this->redirect('/login');
            return;
        }

        if (!password_verify($_POST['token'], $user['reset_token'])) {
            $this->withErrors(['_general' => ['Invalid password reset link.']]);
            $this->redirect('/login');
            return;
        }

        \App\Core\Database::query(
            "UPDATE users SET password = :pass, reset_token = NULL, reset_token_expires = NULL WHERE id = :id",
            ['pass' => password_hash($_POST['password'], PASSWORD_BCRYPT), 'id' => $user['id']]
        );

        $this->withSuccess('Password reset successfully. Please login with your new password.');
        $this->redirect('/login');
    }

    public function logout(): void
    {
        Auth::logout();
        $this->redirect('/');
    }
}
