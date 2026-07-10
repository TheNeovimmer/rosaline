<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Database;
use App\Models\Order;

class ReturnRequestController extends Controller
{
    public function index(): void
    {
        $page = (int) ($_GET['page'] ?? 1);

        $where = "status = 'return_requested'";
        $result = Order::paginate($page, 15, $where, [], 'created_at DESC');

        $this->adminView('admin/return-requests/index', [
            'orders' => $result['items'],
            'pagination' => [
                'current_page' => $result['current_page'],
                'last_page' => $result['last_page'],
                'total' => $result['total'],
            ],
        ]);
    }

    public function approve(int $id): void
    {
        $order = Order::find($id);
        if (!$order || $order['status'] !== 'return_requested') {
            $this->withError('Invalid return request.');
            $this->redirectBack();
            return;
        }

        Order::updateStatus($id, 'returned', $_POST['notes'] ?? 'Return approved by admin');
        $this->withSuccess('Return approved. Stock restituted.');
        $this->redirect('/admin/return-requests');
    }

    public function reject(int $id): void
    {
        $order = Order::find($id);
        if (!$order || $order['status'] !== 'return_requested') {
            $this->withError('Invalid return request.');
            $this->redirectBack();
            return;
        }

        Order::updateStatus($id, 'delivered', $_POST['notes'] ?? 'Return rejected by admin');
        $this->withSuccess('Return request rejected. Order restored to delivered.');
        $this->redirect('/admin/return-requests');
    }
}