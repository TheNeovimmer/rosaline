<?php
namespace App\Middleware;

use App\Core\Auth;

class AdminMiddleware
{
    public function handle(): ?bool
    {
        if (!Auth::check() || !Auth::isAdmin()) {
            http_response_code(403);
            echo 'Access denied. Admin only.';
            exit;
        }
        return null;
    }
}
