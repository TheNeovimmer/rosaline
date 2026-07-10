<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Database;
use App\Models\Order;
use App\Models\Governorate;

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
        $govId = trim($_GET['governorate_id'] ?? '');

        $where = '1=1';
        $params = [];

        if ($status !== '') {
            $where .= ' AND o.status = :status';
            $params['status'] = $status;
        }

        if ($govId !== '') {
            $where .= ' AND o.governorate_id = :gov_id';
            $params['gov_id'] = (int) $govId;
        }

        $total = (int) Database::fetch(
            "SELECT COUNT(*) as cnt FROM orders o WHERE {$where}",
            $params
        )['cnt'];

        $perPage = 15;
        $lastPage = max(1, (int) ceil($total / $perPage));
        $page = max(1, min($page, $lastPage));
        $offset = ($page - 1) * $perPage;

        $orders = Database::fetchAll(
            "SELECT o.*, u.name as user_name, u.email as user_email, g.name_en as governorate_name
             FROM orders o
             LEFT JOIN users u ON u.id = o.user_id
             LEFT JOIN governorates g ON g.id = o.governorate_id
             WHERE {$where}
             ORDER BY o.created_at DESC
             LIMIT {$perPage} OFFSET {$offset}",
            $params
        );

        $this->adminView('admin/orders/index', [
            'orders'        => $orders,
            'status'        => $status,
            'governorate_id'=> $govId,
            'governorates'  => Governorate::getActive(),
            'pagination'    => [
                'current_page' => $page,
                'last_page'    => $lastPage,
                'total'        => $total,
            ],
        ]);
    }

    public function show(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $order = Database::fetch(
            "SELECT o.*, u.name as user_name, u.email as user_email FROM orders o LEFT JOIN users u ON u.id = o.user_id WHERE o.id = ?",
            [$id]
        );

        if (!$order) {
            $this->redirect('/admin/orders');
            return;
        }

        $items = Database::fetchAll(
            "SELECT oi.*, p.name, p.slug, p.image FROM order_items oi LEFT JOIN products p ON p.id = oi.product_id WHERE oi.order_id = ?",
            [$id]
        );

        $order['items'] = $items;

        $govName = '';
        if (!empty($order['governorate_id'])) {
            $g = Database::fetch("SELECT name_en FROM governorates WHERE id = ?", [$order['governorate_id']]);
            $govName = $g ? $g['name_en'] : '';
        }

        $history = Order::getStatusHistory($id);

        $this->adminView('admin/orders/detail', [
            'order'   => $order,
            'gov_name'=> $govName,
            'history' => $history,
        ]);
    }

    public function updateStatus(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $newStatus = trim($_POST['status'] ?? '');
        $notes = trim($_POST['notes'] ?? '');

        $order = Order::find($id);
        if (!$order) {
            $this->withError('Order not found.');
            $this->redirectBack();
            return;
        }

        if (!Order::canTransition($order['status'], $newStatus)) {
            $this->withError("Cannot transition from {$order['status']} to {$newStatus}.");
            $this->redirectBack();
            return;
        }

        Order::updateStatus($id, $newStatus, $notes);

        $this->withSuccess("Order status updated to {$newStatus}.");
        $this->redirect('/admin/orders/' . $id);
    }

    public function adminInvoice(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $order = Database::fetch(
            "SELECT o.*, u.name as user_name, u.email as user_email FROM orders o LEFT JOIN users u ON o.user_id = u.id WHERE o.id = ?",
            [$id]
        );

        if (!$order) {
            $this->redirect('/admin/orders');
            return;
        }

        $order['items'] = Database::fetchAll(
            "SELECT oi.*, p.name, p.slug, p.image, p.price as product_price FROM order_items oi LEFT JOIN products p ON p.id = oi.product_id WHERE oi.order_id = ?",
            [$id]
        );

        $govName = '';
        if (!empty($order['governorate_id'])) {
            $g = Database::fetch("SELECT name_en FROM governorates WHERE id = ?", [$order['governorate_id']]);
            $govName = $g ? $g['name_en'] : '';
        }

        $app = require __DIR__ . '/../../../config/app.php';
        $baseUrl = rtrim($app['url'], '/');

        require __DIR__ . '/../../../views/front/invoice.php';
    }
}