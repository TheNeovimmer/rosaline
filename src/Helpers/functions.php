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

function formatPrice(float $price): string
{
    return '$' . number_format($price, 2);
}

function formatDate(string $date, string $format = 'M d, Y'): string
{
    return date($format, strtotime($date));
}
