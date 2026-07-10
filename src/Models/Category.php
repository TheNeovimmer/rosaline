<?php
namespace App\Models;

use App\Core\Database;
use App\Core\Model;

class Category extends Model
{
    protected static string $table = 'categories';

    public static function findBySlug(string $slug): ?array
    {
        return static::whereFirst('slug', '=', $slug);
    }

    public static function getParent(): ?array
    {
        return Database::fetch(
            "SELECT * FROM " . static::$table . " WHERE id = :parent_id LIMIT 1",
            ['parent_id' => static::$parentId]
        );
    }

    public static function getChildren(): array
    {
        return Database::fetchAll(
            "SELECT * FROM " . static::$table . " WHERE parent_id = :parent_id ORDER BY name ASC",
            ['parent_id' => static::$parentId]
        );
    }
}
