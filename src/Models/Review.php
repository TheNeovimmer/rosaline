<?php
namespace App\Models;

use App\Core\Database;
use App\Core\Model;

class Review extends Model
{
    protected static string $table = 'reviews';

    public static function getByProduct(int $productId): array
    {
        return Database::fetchAll(
            "SELECT * FROM " . static::$table . " WHERE product_id = :product_id AND status = 'approved' ORDER BY created_at DESC",
            ['product_id' => $productId]
        );
    }

    public static function getAverageRating(int $productId): float
    {
        $result = Database::fetch(
            "SELECT ROUND(AVG(rating), 1) as avg_rating FROM " . static::$table . " WHERE product_id = :product_id AND status = 'approved'",
            ['product_id' => $productId]
        );
        return (float) ($result['avg_rating'] ?? 0);
    }
}
