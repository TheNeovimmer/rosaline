<?php
namespace App\Models;

use App\Core\Database;
use App\Core\Model;

class Order extends Model
{
    protected static string $table = 'orders';

    public static function getMonthlyRevenue(int $months = 12): array
    {
        return Database::fetchAll(
            "SELECT DATE_FORMAT(created_at, '%Y-%m') as month,
                    COALESCE(SUM(total), 0) as revenue,
                    COUNT(*) as order_count
             FROM orders
             WHERE status != 'cancelled' AND created_at >= DATE_SUB(NOW(), INTERVAL :months MONTH)
             GROUP BY DATE_FORMAT(created_at, '%Y-%m')
             ORDER BY month ASC",
            ['months' => $months]
        );
    }

    public static function getRevenueByRange(string $start, string $end): float
    {
        $row = Database::fetch(
            "SELECT COALESCE(SUM(total), 0) as total FROM orders WHERE status != 'cancelled' AND created_at >= :start AND created_at < :end",
            ['start' => $start, 'end' => $end]
        );
        return (float) ($row['total'] ?? 0);
    }

    public static function getByUser(int $userId): array
    {
        return Database::fetchAll(
            "SELECT * FROM " . static::$table . " WHERE user_id = :user_id ORDER BY created_at DESC",
            ['user_id' => $userId]
        );
    }

    public static function getWithItems(int $orderId): ?array
    {
        $order = static::find($orderId);
        if (!$order) {
            return null;
        }

        $order['items'] = Database::fetchAll(
            "SELECT oi.*, p.name, p.slug, p.image, p.price
             FROM order_items oi
             LEFT JOIN products p ON p.id = oi.product_id
             WHERE oi.order_id = :order_id",
            ['order_id' => $orderId]
        );

        return $order;
    }
}
