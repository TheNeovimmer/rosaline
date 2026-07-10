<?php
namespace App\Models;

use App\Core\Database;

class Setting
{
    public static function get(string $key, mixed $default = ''): mixed
    {
        $row = Database::fetch("SELECT `value` FROM settings WHERE `key` = :key", ['key' => $key]);
        return $row ? $row['value'] : $default;
    }

    public static function set(string $key, mixed $value): void
    {
        Database::execute(
            "INSERT INTO settings (`key`, `value`) VALUES (:key, :value) ON DUPLICATE KEY UPDATE `value` = :value2",
            ['key' => $key, 'value' => $value, 'value2' => $value]
        );
    }

    public static function all(): array
    {
        return Database::fetchAll("SELECT * FROM settings ORDER BY `key` ASC");
    }
}
