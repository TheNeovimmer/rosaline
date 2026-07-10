<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $page = (int) ($_GET['page'] ?? 1);
        $search = trim($_GET['search'] ?? '');

        $where = '1=1';
        $params = [];

        if ($search !== '') {
            $where .= ' AND (name LIKE :search OR email LIKE :search)';
            $params['search'] = '%' . $search . '%';
        }

        $result = User::paginate($page, 15, $where, $params, 'id DESC');

        $this->view('admin/users/index', [
            'users'          => $result['items'],
            'pagination'     => $result,
            'search'         => $search,
            'current_user_id' => Auth::id(),
        ], 'admin');
    }

    public function edit(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $user = User::find($id);
        if (!$user) {
            $this->redirect('/admin/users');
            return;
        }

        $this->view('admin/users/form', [
            'user' => $user,
        ], 'admin');
    }

    public function update(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $user = User::find($id);
        if (!$user) {
            $this->redirect('/admin/users');
            return;
        }

        $errors = $this->validate($_POST, [
            'name'  => 'required|min:2|max:255',
            'email' => 'required|email',
        ]);

        if (!empty($errors)) {
            $this->withErrors($errors);
            $this->withOld($_POST);
            $this->redirectBack();
            return;
        }

        $data = [
            'name'  => $_POST['name'],
            'email' => $_POST['email'],
            'role'  => $_POST['role'] ?? 'customer',
        ];

        if (!empty($_POST['password'])) {
            $data['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT);
        }

        User::updateWhere($data, 'id = :id', ['id' => $id]);

        $this->logActivity('update', 'user', $id, 'Updated user: ' . $data['email']);
        $this->withSuccess('User updated successfully.');
        $this->redirect('/admin/users');
    }

    public function destroy(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        if ((int) $id === Auth::id()) {
            $this->withErrors(['general' => ['You cannot delete your own account.']]);
            $this->redirectBack();
            return;
        }

        User::deleteWhere('id = :id', ['id' => $id]);

        $this->logActivity('delete', 'user', $id, 'Deleted user ID: ' . $id);
        $this->withSuccess('User deleted successfully.');
        $this->redirect('/admin/users');
    }
}
