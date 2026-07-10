<?php
namespace App\Core;

abstract class Model
{
    protected static string $table;
    protected static string $primaryKey = 'id';

    public static function all(): array
    {
        return Database::fetchAll("SELECT * FROM " . static::$table);
    }

    public static function find(int|string $id): ?array
    {
        return Database::fetch(
            "SELECT * FROM " . static::$table . " WHERE " . static::$primaryKey . " = :id",
            ['id' => $id]
        );
    }

    public static function where(string $column, string $operator, mixed $value): array
    {
        return Database::fetchAll(
            "SELECT * FROM " . static::$table . " WHERE {$column} {$operator} :value",
            ['value' => $value]
        );
    }

    public static function whereFirst(string $column, string $operator, mixed $value): ?array
    {
        return Database::fetch(
            "SELECT * FROM " . static::$table . " WHERE {$column} {$operator} :value LIMIT 1",
            ['value' => $value]
        );
    }

    public static function create(array $data): int
    {
        return Database::insert(static::$table, $data);
    }

    public static function updateWhere(array $data, string $where, array $whereParams = []): int
    {
        return Database::update(static::$table, $data, $where, $whereParams);
    }

    public static function deleteWhere(string $where, array $params = []): int
    {
        return Database::delete(static::$table, $where, $params);
    }

    public static function count(): int
    {
        return (int) Database::fetch("SELECT COUNT(*) as cnt FROM " . static::$table)['cnt'];
    }

    public static function paginate(int $page = 1, int $perPage = 12, string $where = '1=1', array $params = [], string $orderBy = 'id DESC'): array
    {
        $total = (int) Database::fetch(
            "SELECT COUNT(*) as cnt FROM " . static::$table . " WHERE {$where}",
            $params
        )['cnt'];

        $lastPage = max(1, (int) ceil($total / $perPage));
        $page = max(1, min($page, $lastPage));
        $offset = ($page - 1) * $perPage;

        $items = Database::fetchAll(
            "SELECT * FROM " . static::$table . " WHERE {$where} ORDER BY {$orderBy} LIMIT {$perPage} OFFSET {$offset}",
            $params
        );

        return [
            'items'        => $items,
            'current_page' => $page,
            'per_page'     => $perPage,
            'total'        => $total,
            'last_page'    => $lastPage,
            'has_more'     => $page < $lastPage,
        ];
    }
}
