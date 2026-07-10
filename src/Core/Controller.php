<?php
namespace App\Core;

use App\Models\ActivityLog;

abstract class Controller
{
    protected function view(string $view, array $data = [], string $layout = 'front'): void
    {
        View::render($view, $data, $layout);
    }

    protected function redirect(string $path): void
    {
        $url = rtrim((require __DIR__ . '/../../config/app.php')['url'], '/') . '/' . ltrim($path, '/');
        header('Location: ' . $url);
        exit;
    }

    protected function redirectBack(): void
    {
        $ref = $_SERVER['HTTP_REFERER'] ?? '/';
        header('Location: ' . $ref);
        exit;
    }

    protected function json(array $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    protected function validate(array $data, array $rules): array
    {
        $errors = [];
        foreach ($rules as $field => $ruleSet) {
            $ruleList = is_array($ruleSet) ? $ruleSet : explode('|', $ruleSet);
            foreach ($ruleList as $rule) {
                if ($rule === 'required' && empty($data[$field])) {
                    $errors[$field][] = "{$field} is required";
                }
                if (str_starts_with($rule, 'min:') && isset($data[$field]) && strlen($data[$field]) < (int) substr($rule, 4)) {
                    $errors[$field][] = "{$field} must be at least " . substr($rule, 4) . " characters";
                }
                if (str_starts_with($rule, 'max:') && isset($data[$field]) && strlen($data[$field]) > (int) substr($rule, 4)) {
                    $errors[$field][] = "{$field} must not exceed " . substr($rule, 4) . " characters";
                }
                if ($rule === 'email' && isset($data[$field]) && !filter_var($data[$field], FILTER_VALIDATE_EMAIL)) {
                    $errors[$field][] = "Invalid email format";
                }
                if ($rule === 'numeric' && isset($data[$field]) && !is_numeric($data[$field])) {
                    $errors[$field][] = "{$field} must be numeric";
                }
            }
        }
        return $errors;
    }

    protected function old(string $key, mixed $default = ''): mixed
    {
        return $_SESSION['_flash']['old'][$key] ?? $default;
    }

    protected function error(string $key): ?string
    {
        return $_SESSION['_flash']['errors'][$key][0] ?? null;
    }

    protected function hasErrors(): bool
    {
        return !empty($_SESSION['_flash']['errors']);
    }

    protected function withErrors(array $errors): void
    {
        $_SESSION['_flash']['errors'] = $errors;
    }

    protected function withOld(array $data): void
    {
        $_SESSION['_flash']['old'] = $data;
    }

    protected function withSuccess(string $message): void
    {
        $_SESSION['_flash']['success'] = $message;
    }

    protected function logActivity(string $action, string $entityType, ?int $entityId = null, string $details = ''): void
    {
        if ($userId = Auth::id()) {
            ActivityLog::log($userId, $action, $entityType, $entityId, $details);
        }
    }
}
