<?php
namespace App\Middleware;

use App\Core\Auth;
use App\Core\Session;

class AuthMiddleware
{
    public function handle(): ?bool
    {
        if (!Auth::check()) {
            Session::flash('redirect', $_SERVER['REQUEST_URI']);
            header('Location: ' . (rtrim((require __DIR__ . '/../../config/app.php')['url'], '/') . '/login'));
            exit;
        }
        return null;
    }
}
