<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Database;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        $page = (int) ($_GET['page'] ?? 1);
        $status = trim($_GET['status'] ?? '');
        $where = '1=1';
        $params = [];
        if ($status !== '') { $where .= ' AND r.status = :status'; $params['status'] = $status; }
        $total = (int) Database::fetch("SELECT COUNT(*) as cnt FROM reviews r WHERE {$where}", $params)['cnt'];
        $lastPage = max(1, (int) ceil($total / 15));
        $page = max(1, min($page, $lastPage));
        $offset = ($page - 1) * 15;
        $reviews = Database::fetchAll(
            "SELECT r.*, u.name as user_name, p.name as product_name
             FROM reviews r LEFT JOIN users u ON u.id = r.user_id LEFT JOIN products p ON p.id = r.product_id
             WHERE {$where} ORDER BY r.created_at DESC LIMIT 15 OFFSET {$offset}", $params);
        $this->view('admin/reviews/index', ['reviews' => $reviews, 'pagination' => ['items' => $reviews, 'current_page' => $page, 'per_page' => 15, 'total' => $total, 'last_page' => $lastPage, 'has_more' => $page < $lastPage], 'status' => $status], 'admin');
    }

    public function approve(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        Database::query("UPDATE reviews SET status = 'approved' WHERE id = :id", ['id' => $id]);
        $this->logActivity('update', 'review', $id, 'Approved review #' . $id);
        $this->withSuccess('Review approved.'); $this->redirectBack();
    }

    public function reject(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        Database::query("UPDATE reviews SET status = 'rejected' WHERE id = :id", ['id' => $id]);
        $this->logActivity('update', 'review', $id, 'Rejected review #' . $id);
        $this->withSuccess('Review rejected.'); $this->redirectBack();
    }

    public function destroy(int $id): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }
        Database::query("DELETE FROM reviews WHERE id = :id", ['id' => $id]);
        $this->logActivity('delete', 'review', $id, 'Deleted review #' . $id);
        $this->withSuccess('Review deleted.'); $this->redirect('/admin/reviews');
    }
}
