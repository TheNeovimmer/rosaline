<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Core\Auth;
use App\Core\Database;

class DashboardController extends Controller
{
    public function index(): void
    {
        if (!Auth::isAdmin()) {
            $this->redirect('/');
            return;
        }

        $totalProducts = (int) Database::fetch("SELECT COUNT(*) as cnt FROM products")['cnt'];
        $totalOrders = (int) Database::fetch("SELECT COUNT(*) as cnt FROM orders")['cnt'];
        $totalUsers = (int) Database::fetch("SELECT COUNT(*) as cnt FROM users")['cnt'];
        $totalRevenue = (float) (Database::fetch("SELECT COALESCE(SUM(total), 0) as total FROM orders WHERE status != 'cancelled'")['total'] ?? 0);

        $todayStats = Database::fetch(
            "SELECT COUNT(*) as orders, COALESCE(SUM(total), 0) as revenue, COALESCE(SUM(CASE WHEN payment_method = 'cod' THEN total ELSE 0 END), 0) as cod_revenue
             FROM orders WHERE status != 'cancelled' AND DATE(created_at) = CURDATE()"
        );

        $codStats = Database::fetch(
            "SELECT COUNT(*) as total_cod, COALESCE(SUM(CASE WHEN payment_status = 'pending' THEN 1 ELSE 0 END), 0) as pending_cod,
                    COALESCE(SUM(CASE WHEN payment_status = 'paid' THEN total ELSE 0 END), 0) as collected_cod
             FROM orders WHERE payment_method = 'cod'"
        );

        $paymentBreakdown = Database::fetchAll(
            "SELECT payment_method, COUNT(*) as count, COALESCE(SUM(total), 0) as total
             FROM orders GROUP BY payment_method ORDER BY count DESC"
        );

        $recentOrders = Database::fetchAll(
            "SELECT o.*, u.name as user_name
             FROM orders o
             LEFT JOIN users u ON u.id = o.user_id
             ORDER BY o.created_at DESC
             LIMIT 10"
        );

        $monthlyRevenue = Database::fetchAll(
            "SELECT DATE_FORMAT(created_at, '%Y-%m') as month, COALESCE(SUM(total), 0) as revenue
             FROM orders
             WHERE status != 'cancelled' AND created_at >= DATE_SUB(NOW(), INTERVAL 12 MONTH)
             GROUP BY DATE_FORMAT(created_at, '%Y-%m')
             ORDER BY month ASC"
        );

        $ordersByStatus = Database::fetchAll(
            "SELECT status, COUNT(*) as count
             FROM orders
             GROUP BY status
             ORDER BY count DESC"
        );

        $lowStockProducts = Database::fetchAll(
            "SELECT id, name, stock_quantity FROM products WHERE stock_quantity <= 10 ORDER BY stock_quantity ASC LIMIT 5"
        );

        $topProducts = Database::fetchAll(
            "SELECT p.id, p.name, COALESCE(SUM(oi.quantity), 0) as total_sold
             FROM products p
             LEFT JOIN order_items oi ON oi.product_id = p.id
             LEFT JOIN orders o ON o.id = oi.order_id AND o.status != 'cancelled'
             GROUP BY p.id
             ORDER BY total_sold DESC
             LIMIT 5"
        );

        $recentActivity = Database::fetchAll(
            "SELECT a.*, u.name as user_name
             FROM activity_logs a
             LEFT JOIN users u ON u.id = a.user_id
             ORDER BY a.created_at DESC
             LIMIT 5"
        );

        $pendingCodOrders = Database::fetchAll(
            "SELECT o.id, o.order_number, o.total, o.created_at, u.name as user_name
             FROM orders o
             LEFT JOIN users u ON u.id = o.user_id
             WHERE o.payment_method = 'cod' AND o.payment_status = 'pending'
             ORDER BY o.created_at DESC
             LIMIT 5"
        );

        $this->view('admin/dashboard', [
            'totalProducts'     => $totalProducts,
            'totalOrders'       => $totalOrders,
            'totalUsers'        => $totalUsers,
            'totalRevenue'      => $totalRevenue,
            'todayOrders'       => (int) ($todayStats['orders'] ?? 0),
            'todayRevenue'      => (float) ($todayStats['revenue'] ?? 0),
            'todayCodRevenue'   => (float) ($todayStats['cod_revenue'] ?? 0),
            'totalCod'          => (int) ($codStats['total_cod'] ?? 0),
            'pendingCod'        => (int) ($codStats['pending_cod'] ?? 0),
            'collectedCod'      => (float) ($codStats['collected_cod'] ?? 0),
            'paymentBreakdown'  => $paymentBreakdown,
            'recentOrders'      => $recentOrders,
            'monthlyRevenue'    => $monthlyRevenue,
            'ordersByStatus'    => $ordersByStatus,
            'lowStockProducts'  => $lowStockProducts,
            'topProducts'       => $topProducts,
            'recentActivity'    => $recentActivity,
            'pendingCodOrders'  => $pendingCodOrders,
        ], 'admin');
    }
}
