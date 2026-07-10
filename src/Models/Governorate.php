<?php
namespace App\Models;

use App\Core\Database;
use App\Core\Model;

class Governorate extends Model
{
    protected static string $table = 'governorates';

    public static function getActive(): array
    {
        return Database::fetchAll("SELECT * FROM governorates WHERE is_active = 1 ORDER BY name_en");
    }

    public static function getShippingFee(int $id): float
    {
        $stmt = Database::query("SELECT shipping_fee FROM governorates WHERE id = ?", [$id]);
        return (float)($stmt->fetchColumn() ?: 0);
    }
}
