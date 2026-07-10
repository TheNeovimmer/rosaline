<?php
namespace App\Models;

use App\Core\Model;

class Page extends Model
{
    protected static string $table = 'pages';

    public static function findBySlug(string $slug): ?array
    {
        return static::whereFirst('slug', '=', $slug);
    }
}
