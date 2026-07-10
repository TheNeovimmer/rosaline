<?php
use App\Core\Session;
use App\Core\Auth;

function asset(string $path): string
{
    $baseUrl = rtrim((require __DIR__ . '/../../config/app.php')['url'], '/');
    return $baseUrl . '/assets/' . ltrim($path, '/');
}

function url(string $path = ''): string
{
    $baseUrl = rtrim((require __DIR__ . '/../../config/app.php')['url'], '/');
    return $baseUrl . '/' . ltrim($path, '/');
}

function old(string $key, mixed $default = ''): mixed
{
    return $_SESSION['_flash']['old'][$key] ?? $default;
}

function error(string $key): ?string
{
    return $_SESSION['_flash']['errors'][$key][0] ?? null;
}

function hasErrors(): bool
{
    return !empty($_SESSION['_flash']['errors']);
}

function success(): ?string
{
    return Session::getFlash('success');
}

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function truncate(string $text, int $length = 100): string
{
    if (mb_strlen($text) <= $length) return $text;
    return mb_substr($text, 0, $length) . '...';
}

function csrf_token(): string
{
    if (!isset($_SESSION['_csrf_token'])) {
        $_SESSION['_csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['_csrf_token'];
}

function csrf_field(): string
{
    return '<input type="hidden" name="_csrf" value="' . csrf_token() . '">';
}

function send_mail(string $to, string $subject, string $body, string $from = ''): bool
{
    if ($from === '') {
        $from = 'noreply@rosaline.com';
    }
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    $headers .= "From: " . $from . "\r\n";
    $headers .= "Reply-To: " . $from . "\r\n";
    return mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, $headers);
}

function formatPrice(float $price): string
{
    return number_format($price, 3, '.', '') . ' TND';
}

function isTunisianPhone(string $phone): bool
{
    return (bool)preg_match('/^\+216[2-9]\d{7}$/', $phone);
}

function governorateDropdown(int $selectedId = 0): string
{
    $db = App\Core\Database::getInstance();
    $rows = $db->query("SELECT id, name_en FROM governorates WHERE is_active = 1 ORDER BY name_en")->fetchAll();
    $html = '<select name="governorate_id" class="style-4" required>';
    $html .= '<option value="">Select governorate</option>';
    foreach ($rows as $row) {
        $sel = (int)$row['id'] === $selectedId ? ' selected' : '';
        $html .= '<option value="' . $row['id'] . '"' . $sel . '>' . htmlspecialchars($row['name_en']) . '</option>';
    }
    $html .= '</select>';
    return $html;
}

function formatDate(string $date, string $format = 'M d, Y'): string
{
    return date($format, strtotime($date));
}
