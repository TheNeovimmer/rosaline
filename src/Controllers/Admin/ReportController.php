<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Database;
use App\Models\Order;

class ReportController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }

        $monthlyRevenue = Order::getMonthlyRevenue(12);
        $totalRevenue = array_sum(array_column($monthlyRevenue, 'revenue'));

        $topProducts = Database::fetchAll(
            "SELECT p.id, p.name, p.slug, p.price, p.stock_quantity,
                    COALESCE(SUM(oi.quantity), 0) as total_sold,
                    COALESCE(SUM(oi.quantity * oi.product_price), 0) as total_revenue
             FROM products p
             LEFT JOIN order_items oi ON oi.product_id = p.id
             LEFT JOIN orders o ON o.id = oi.order_id AND o.status != 'cancelled'
             GROUP BY p.id
             ORDER BY total_sold DESC
             LIMIT 20"
        );

        $userSignups = Database::fetchAll(
            "SELECT DATE_FORMAT(created_at, '%Y-%m') as month, COUNT(*) as count
             FROM users
             WHERE created_at >= DATE_SUB(NOW(), INTERVAL 12 MONTH)
             GROUP BY DATE_FORMAT(created_at, '%Y-%m')
             ORDER BY month ASC"
        );

        $this->view('admin/reports/index', [
            'monthlyRevenue' => $monthlyRevenue,
            'totalRevenue' => $totalRevenue,
            'topProducts' => $topProducts,
            'userSignups' => $userSignups,
        ], 'admin');
    }

    public function exportSales(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }

        $rows = Order::getMonthlyRevenue(24);
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=sales-report.csv');
        $out = fopen('php://output', 'w');
        fputcsv($out, ['Month', 'Revenue', 'Orders']);
        foreach ($rows as $r) {
            fputcsv($out, [$r['month'], $r['revenue'], $r['order_count']]);
        }
        fclose($out);
        exit;
    }

    public function exportProducts(): void
    {
        if (!Auth::isAdmin()) { $this->redirect('/'); return; }

        $rows = Database::fetchAll(
            "SELECT p.id, p.name, p.sku, p.price, p.stock_quantity,
                    COALESCE(SUM(oi.quantity), 0) as total_sold
             FROM products p
             LEFT JOIN order_items oi ON oi.product_id = p.id
             LEFT JOIN orders o ON o.id = oi.order_id AND o.status != 'cancelled'
             GROUP BY p.id
             ORDER BY total_sold DESC"
        );
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=products-report.csv');
        $out = fopen('php://output', 'w');
        fputcsv($out, ['ID', 'Name', 'SKU', 'Price', 'Stock', 'Total Sold']);
        foreach ($rows as $r) {
            fputcsv($out, [$r['id'], $r['name'], $r['sku'] ?? '', $r['price'], $r['stock_quantity'], $r['total_sold']]);
        }
        fclose($out);
        exit;
    }
}
