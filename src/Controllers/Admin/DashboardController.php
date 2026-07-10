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
            "SELECT COUNT(*) as orders, COALESCE(SUM(total), 0) as revenue
             FROM orders WHERE status != 'cancelled' AND DATE(created_at) = CURDATE()"
        );

        $pendingOrders = (int) (Database::fetch("SELECT COUNT(*) as cnt FROM orders WHERE status = 'pending'")['cnt'] ?? 0);
        $pendingReturns = (int) (Database::fetch("SELECT COUNT(*) as cnt FROM orders WHERE status = 'return_requested'")['cnt'] ?? 0);

        $lowStockProducts = Database::fetchAll(
            "SELECT id, name, stock_quantity, low_stock_threshold FROM products WHERE stock_quantity <= COALESCE(low_stock_threshold, 5) ORDER BY stock_quantity ASC LIMIT 5"
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

        $recentOrders = Database::fetchAll(
            "SELECT o.*, u.name as user_name
             FROM orders o
             LEFT JOIN users u ON u.id = o.user_id
             ORDER BY o.created_at DESC
             LIMIT 5"
        );

        $recentActivity = Database::fetchAll(
            "SELECT a.*, u.name as user_name
             FROM activity_logs a
             LEFT JOIN users u ON u.id = a.user_id
             ORDER BY a.created_at DESC
             LIMIT 5"
        );

        $dailyRevenue = Database::fetchAll(
            "SELECT DATE(created_at) as day, COALESCE(SUM(total), 0) as revenue, COUNT(*) as orders
             FROM orders
             WHERE status != 'cancelled' AND created_at >= DATE_SUB(CURDATE(), INTERVAL 13 DAY)
             GROUP BY DATE(created_at)
             ORDER BY day ASC"
        );

        $ordersByStatus = Database::fetchAll(
            "SELECT status, COUNT(*) as count FROM orders GROUP BY status ORDER BY count DESC"
        );

        $thisMonth = Database::fetch(
            "SELECT COALESCE(SUM(total), 0) as revenue, COUNT(*) as orders
             FROM orders WHERE status != 'cancelled' AND DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')"
        );

        $lastMonth = Database::fetch(
            "SELECT COALESCE(SUM(total), 0) as revenue, COUNT(*) as orders
             FROM orders WHERE status != 'cancelled' AND DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 MONTH), '%Y-%m')"
        );

        $newCustomersThisMonth = (int) (Database::fetch(
            "SELECT COUNT(*) as cnt FROM users WHERE DATE_FORMAT(created_at, '%Y-%m') = DATE_FORMAT(CURDATE(), '%Y-%m')"
        )['cnt'] ?? 0);

        $avgOrderValue = (float) (Database::fetch(
            "SELECT COALESCE(AVG(total), 0) as avg FROM orders WHERE status != 'cancelled'"
        )['avg'] ?? 0);

        $deliveredOrders = (int) (Database::fetch(
            "SELECT COUNT(*) as cnt FROM orders WHERE status = 'delivered'"
        )['cnt'] ?? 0);

        $this->view('admin/dashboard', [
            'totalProducts'        => $totalProducts,
            'totalOrders'          => $totalOrders,
            'totalUsers'           => $totalUsers,
            'totalRevenue'         => $totalRevenue,
            'todayOrders'          => (int) ($todayStats['orders'] ?? 0),
            'todayRevenue'         => (float) ($todayStats['revenue'] ?? 0),
            'pendingOrders'        => $pendingOrders,
            'pendingReturns'       => $pendingReturns,
            'lowStockProducts'     => $lowStockProducts,
            'topProducts'          => $topProducts,
            'recentOrders'         => $recentOrders,
            'recentActivity'       => $recentActivity,
            'ordersByStatus'       => $ordersByStatus,
            'dailyRevenue'         => $dailyRevenue,
            'thisMonthRevenue'     => (float) ($thisMonth['revenue'] ?? 0),
            'thisMonthOrders'      => (int) ($thisMonth['orders'] ?? 0),
            'lastMonthRevenue'     => (float) ($lastMonth['revenue'] ?? 0),
            'lastMonthOrders'      => (int) ($lastMonth['orders'] ?? 0),
            'newCustomersThisMonth'=> $newCustomersThisMonth,
            'avgOrderValue'        => $avgOrderValue,
            'deliveredOrders'      => $deliveredOrders,
        ], 'admin');
    }
}
