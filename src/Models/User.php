<?php
namespace App\Models;

use App\Core\Database;
use App\Core\Model;

class User extends Model
{
    protected static string $table = 'users';

    public static function findByEmail(string $email): ?array
    {
        return static::whereFirst('email', '=', $email);
    }

    public static function hasRole(string $role): array
    {
        return static::where('role', '=', $role);
    }
}
