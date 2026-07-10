<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $page = (int) ($_GET['page'] ?? 1);
        $status = trim($_GET['status'] ?? '');

        $where = '1=1';
        $params = [];

        if ($status !== '') {
            $where .= ' AND o.status = :status';
            $params['status'] = $status;
        }

        $total = (int) \App\Core\Database::fetch(
            "SELECT COUNT(*) as cnt FROM orders o WHERE {$where}",
            $params
        )['cnt'];

        $lastPage = max(1, (int) ceil($total / 15));
        $page = max(1, min($page, $lastPage));
        $offset = ($page - 1) * 15;

        $orders = \App\Core\Database::fetchAll(
            "SELECT o.*, u.name as user_name, u.email as user_email
             FROM orders o
             LEFT JOIN users u ON u.id = o.user_id
             WHERE {$where}
             ORDER BY o.created_at DESC
             LIMIT 15 OFFSET {$offset}",
            $params
        );

        $this->view('admin/orders/index', [
            'orders'     => $orders,
            'pagination' => [
                'items'        => $orders,
                'current_page' => $page,
                'per_page'     => 15,
                'total'        => $total,
                'last_page'    => $lastPage,
                'has_more'     => $page < $lastPage,
            ],
            'status'     => $status,
        ], 'admin');
    }

    public function show(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $order = Order::getWithItems($id);
        if (!$order) {
            $this->redirect('/admin/orders');
            return;
        }

        $this->view('admin/orders/detail', [
            'order' => $order,
        ], 'admin');
    }

    public function updateStatus(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $order = Order::find($id);
        if (!$order) {
            $this->redirect('/admin/orders');
            return;
        }

        $status = $_POST['status'] ?? '';
        $allowed = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];

        if (!in_array($status, $allowed)) {
            $this->withErrors(['status' => ['Invalid order status']]);
            $this->redirectBack();
            return;
        }

        Order::updateWhere(
            ['status' => $status],
            'id = :id',
            ['id' => $id]
        );

        $this->logActivity('update', 'order', $id, 'Order #' . ($order['order_number'] ?? $id) . ' status → ' . $status);
        $this->withSuccess('Order status updated to ' . ucfirst($status) . '.');
        $this->redirectBack();
    }
}
