<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Database;

class ContactController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $page = (int) ($_GET['page'] ?? 1);
        $search = trim($_GET['search'] ?? '');
        $where = '1=1';
        $params = [];
        if ($search !== '') {
            $where .= ' AND (name LIKE :search OR email LIKE :search OR subject LIKE :search)';
            $params['search'] = '%' . $search . '%';
        }
        $total = (int) Database::fetch("SELECT COUNT(*) as cnt FROM contacts WHERE {$where}", $params)['cnt'];
        $lastPage = max(1, (int) ceil($total / 15));
        $page = max(1, min($page, $lastPage));
        $offset = ($page - 1) * 15;
        $messages = Database::fetchAll("SELECT * FROM contacts WHERE {$where} ORDER BY created_at DESC LIMIT 15 OFFSET {$offset}", $params);
        $this->view('admin/contacts/index', ['messages' => $messages, 'pagination' => ['items' => $messages, 'current_page' => $page, 'per_page' => 15, 'total' => $total, 'last_page' => $lastPage, 'has_more' => $page < $lastPage], 'search' => $search], 'admin');
    }

    public function show(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $message = Database::fetch("SELECT * FROM contacts WHERE id = :id", ['id' => $id]);
        if (!$message) { $this->redirect('/admin/contacts'); return; }
        Database::query("UPDATE contacts SET is_read = 1 WHERE id = :id", ['id' => $id]);
        $this->view('admin/contacts/detail', ['message' => $message], 'admin');
    }

    public function destroy(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        Database::query("DELETE FROM contacts WHERE id = :id", ['id' => $id]);
        $this->logActivity('delete', 'contact', $id, 'Deleted contact message ID: ' . $id);
        $this->withSuccess('Message deleted.'); $this->redirect('/admin/contacts');
    }
}
