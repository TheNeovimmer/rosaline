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

        $lastPage = max(1, (int) ceil($total / 15));
        $page = max(1, min($page, $lastPage));
        $offset = ($page - 1) * 15;

        $orders = Database::fetchAll(
            "SELECT o.*, u.name as user_name, u.email as user_email
             FROM orders o
             LEFT JOIN users u ON u.id = o.user_id
             WHERE {$where}
             ORDER BY o.created_at DESC
             LIMIT 15 OFFSET {$offset}",
            $params
        );

        $this->view('admin/orders/index', [
            'orders'       => $orders,
            'pagination'   => [
                'items'        => $orders,
                'current_page' => $page,
                'per_page'     => 15,
                'total'        => $total,
                'last_page'    => $lastPage,
                'has_more'     => $page < $lastPage,
            ],
            'status'       => $status,
            'governorate_id' => $govId,
            'governorates' => Governorate::getActive(),
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

        $history = Order::getStatusHistory($id);
        $governorates = Governorate::getActive();

        // Resolve governorate name
        $govName = null;
        if (!empty($order['governorate_id'])) {
            $g = Database::fetch("SELECT name_en FROM governorates WHERE id = ?", [$order['governorate_id']]);
            $govName = $g ? $g['name_en'] : null;
        }

        $this->view('admin/orders/detail', [
            'order'        => $order,
            'history'      => $history,
            'governorates' => $governorates,
            'govName'      => $govName,
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

        $newStatus = $_POST['status'] ?? '';
        $note = $_POST['note'] ?? '';
        $adminId = Auth::id();

        if (Order::updateStatus($id, $newStatus, $note, $adminId)) {
            $this->logActivity('update', 'order', $id, 'Order #' . ($order['order_number'] ?? $id) . ' status → ' . $newStatus);
            $this->withSuccess('Order status updated to ' . ucfirst($newStatus) . '.');
        } else {
            $this->withErrors(['status' => ['Invalid status transition from ' . $order['status'] . ' to ' . $newStatus]]);
        }
        $this->redirectBack();
    }

    public function adminInvoice(int $id): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $stmt = Database::query("SELECT o.*, u.name as user_name, u.email as user_email FROM orders o LEFT JOIN users u ON o.user_id = u.id WHERE o.id = ?", [$id]);
        $order = $stmt->fetch();
        if (!$order) {
            $this->redirect('/admin/orders');
            return;
        }
        $items = Database::query("SELECT * FROM order_items WHERE order_id = ?", [$id])->fetchAll();
        require __DIR__ . '/../../../views/front/invoice.php';
    }
}
