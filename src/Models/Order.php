<?php
namespace App\Models;

use App\Core\Database;
use App\Core\Model;

class Order extends Model
{
    protected static string $table = 'orders';

    public static array $validTransitions = [
        'pending' => ['confirmed', 'cancelled'],
        'confirmed' => ['processing', 'cancelled'],
        'processing' => ['shipped', 'cancelled'],
        'shipped' => ['delivered', 'cancelled'],
        'delivered' => ['return_requested'],
        'return_requested' => ['returned', 'delivered'],
    ];

    public static function canTransition(string $from, string $to): bool
    {
        return isset(self::$validTransitions[$from]) && in_array($to, self::$validTransitions[$from], true);
    }

    public static function updateStatus(int $orderId, string $newStatus, ?string $note = null, ?int $userId = null): bool
    {
        $order = static::find($orderId);
        if (!$order || !self::canTransition($order['status'], $newStatus)) {
            return false;
        }

        $oldStatus = $order['status'];

        if ($newStatus === 'cancelled' && $oldStatus !== 'cancelled') {
            $items = Database::fetchAll("SELECT product_id, quantity FROM order_items WHERE order_id = :oid", ['oid' => $orderId]);
            foreach ($items as $item) {
                Database::query(
                    "UPDATE products SET stock_quantity = stock_quantity + :qty WHERE id = :pid",
                    ['qty' => $item['quantity'], 'pid' => $item['product_id']]
                );
            }
        }

        Database::query("UPDATE orders SET status = ? WHERE id = ?", [$newStatus, $orderId]);
        Database::query("INSERT INTO order_status_history (order_id, from_status, to_status, note, created_by) VALUES (?, ?, ?, ?, ?)",
            [$orderId, $oldStatus, $newStatus, $note, $userId]);

        return true;
    }

    public static function getStatusHistory(int $orderId): array
    {
        $stmt = Database::query(
            "SELECT osh.*, u.name as created_by_name
             FROM order_status_history osh
             LEFT JOIN users u ON osh.created_by = u.id
             WHERE osh.order_id = ?
             ORDER BY osh.created_at ASC", [$orderId]);
        return $stmt->fetchAll();
    }

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
