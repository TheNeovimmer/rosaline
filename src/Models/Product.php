<?php
namespace App\Models;

use App\Core\Database;
use App\Core\Model;

class Product extends Model
{
    protected static string $table = 'products';

    public static function getLowStock(): array
    {
        return Database::fetchAll(
            "SELECT * FROM " . static::$table . " WHERE stock_quantity <= COALESCE(low_stock_threshold, 5) ORDER BY stock_quantity ASC LIMIT 10"
        );
    }

    public static function getTopSellers(int $limit = 5): array
    {
        return Database::fetchAll(
            "SELECT p.id, p.name, p.slug, p.image, p.price, p.stock_quantity,
                    COALESCE(SUM(oi.quantity), 0) as total_sold,
                    COALESCE(SUM(oi.quantity * oi.price), 0) as total_revenue
             FROM products p
             LEFT JOIN order_items oi ON oi.product_id = p.id
             LEFT JOIN orders o ON o.id = oi.order_id AND o.status != 'cancelled'
             GROUP BY p.id
             ORDER BY total_sold DESC
             LIMIT :limit",
            ['limit' => $limit]
        );
    }

    public static function findBySlug(string $slug): ?array
    {
        return static::whereFirst('slug', '=', $slug);
    }

    public static function getFeatured(): array
    {
        return Database::fetchAll(
            "SELECT * FROM " . static::$table . " WHERE featured = 1 AND status = 'active' ORDER BY id DESC LIMIT 8"
        );
    }

    public static function getByCategory(int $categoryId): array
    {
        return Database::fetchAll(
            "SELECT * FROM " . static::$table . " WHERE category_id = :category_id AND status = 'active' ORDER BY id DESC",
            ['category_id' => $categoryId]
        );
    }

    public static function search(string $query): array
    {
        $like = '%' . $query . '%';
        return Database::fetchAll(
            "SELECT * FROM " . static::$table . " WHERE (name LIKE :q OR description LIKE :q) AND status = 'active' ORDER BY id DESC",
            ['q' => $like]
        );
    }

    public static function getRelated(int $productId, int $limit = 4): array
    {
        $product = static::find($productId);
        if (!$product) {
            return [];
        }

        return Database::fetchAll(
            "SELECT * FROM " . static::$table . " WHERE category_id = :category_id AND id != :id AND status = 'active' ORDER BY RAND() LIMIT :limit",
            ['category_id' => $product['category_id'], 'id' => $productId, 'limit' => $limit]
        );
    }
}
