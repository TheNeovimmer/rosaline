<?php
namespace App\Core;

class Auth
{
    public static function login(int $userId, array $user): void
    {
        Session::set('user_id', $userId);
        Session::set('user', $user);
    }

    public static function logout(): void
    {
        Session::remove('user_id');
        Session::remove('user');
    }

    public static function check(): bool
    {
        return Session::has('user_id') && Session::has('user');
    }

    public static function id(): ?int
    {
        return Session::get('user_id');
    }

    public static function user(): ?array
    {
        return Session::get('user');
    }

    public static function isAdmin(): bool
    {
        $user = self::user();
        return $user && ($user['role'] ?? 'customer') === 'admin';
    }

    public static function userOrRedirect(): array
    {
        if (!self::check()) {
            Session::flash('redirect', $_SERVER['REQUEST_URI']);
            header('Location: ' . url('/login'));
            exit;
        }
        return self::user();
    }
}
