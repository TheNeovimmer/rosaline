<?php
namespace App\Models;

use App\Core\Database;
use App\Core\Model;

class Wishlist extends Model
{
    protected static string $table = 'wishlists';

    public static function getByUser(int $userId): array
    {
        return Database::fetchAll(
            "SELECT w.*, p.name, p.slug, p.price, p.image, p.status
             FROM " . static::$table . " w
             LEFT JOIN products p ON p.id = w.product_id
             WHERE w.user_id = :user_id AND p.status = 'active'
             ORDER BY w.created_at DESC",
            ['user_id' => $userId]
        );
    }

    public static function isWishlisted(int $userId, int $productId): bool
    {
        $result = Database::fetch(
            "SELECT id FROM " . static::$table . " WHERE user_id = :user_id AND product_id = :product_id LIMIT 1",
            ['user_id' => $userId, 'product_id' => $productId]
        );
        return $result !== null;
    }

    public static function toggle(int $userId, int $productId): bool
    {
        if (static::isWishlisted($userId, $productId)) {
            Database::query(
                "DELETE FROM " . static::$table . " WHERE user_id = :user_id AND product_id = :product_id",
                ['user_id' => $userId, 'product_id' => $productId]
            );
            return false;
        }

        static::create([
            'user_id'    => $userId,
            'product_id' => $productId,
        ]);
        return true;
    }
}
