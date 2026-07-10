<?php
namespace App\Models;

use App\Core\Database;

class ActivityLog
{
    public static function log(int $userId, string $action, string $entityType, ?int $entityId = null, string $details = ''): void
    {
        Database::query(
            "INSERT INTO activity_logs (user_id, action, entity_type, entity_id, details) VALUES (:user_id, :action, :entity_type, :entity_id, :details)",
            [
                'user_id' => $userId,
                'action' => $action,
                'entity_type' => $entityType,
                'entity_id' => $entityId,
                'details' => $details,
            ]
        );
    }

    public static function getAll(int $page = 1, int $perPage = 50): array
    {
        $offset = ($page - 1) * $perPage;
        $total = (int) Database::fetch("SELECT COUNT(*) as cnt FROM activity_logs")['cnt'];
        $items = Database::fetchAll(
            "SELECT a.*, u.name as user_name, u.email as user_email
             FROM activity_logs a
             LEFT JOIN users u ON u.id = a.user_id
             ORDER BY a.created_at DESC
             LIMIT :limit OFFSET :offset",
            ['limit' => $perPage, 'offset' => $offset]
        );
        return [
            'items' => $items,
            'current_page' => $page,
            'last_page' => max(1, (int) ceil($total / $perPage)),
            'total' => $total,
        ];
    }

    public static function search(string $query, int $page = 1, int $perPage = 50): array
    {
        $offset = ($page - 1) * $perPage;
        $like = '%' . $query . '%';
        $total = (int) Database::fetch(
            "SELECT COUNT(*) as cnt FROM activity_logs a WHERE a.action LIKE :q OR a.entity_type LIKE :q OR a.details LIKE :q",
            ['q' => $like]
        )['cnt'];
        $items = Database::fetchAll(
            "SELECT a.*, u.name as user_name, u.email as user_email
             FROM activity_logs a
             LEFT JOIN users u ON u.id = a.user_id
             WHERE a.action LIKE :q OR a.entity_type LIKE :q OR a.details LIKE :q
             ORDER BY a.created_at DESC
             LIMIT :limit OFFSET :offset",
            ['q' => $like, 'limit' => $perPage, 'offset' => $offset]
        );
        return [
            'items' => $items,
            'current_page' => $page,
            'last_page' => max(1, (int) ceil($total / $perPage)),
            'total' => $total,
        ];
    }
}
