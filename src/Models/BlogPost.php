<?php
namespace App\Models;

use App\Core\Model;

class BlogPost extends Model
{
    protected static string $table = 'blog_posts';

    public static function findBySlug(string $slug): ?array
    {
        return static::whereFirst('slug', '=', $slug);
    }
}
