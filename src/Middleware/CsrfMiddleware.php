<?php
namespace App\Middleware;

use App\Core\Session;

class CsrfMiddleware
{
    public function handle(): ?bool
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $token = $_POST['_csrf'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
            $stored = Session::get('_csrf_token');

            if ($token === '' || $stored === null || !hash_equals($stored, $token)) {
                http_response_code(419);
                echo 'Session expired or invalid token. Please go back and try again.';
                exit;
            }
        }
        return null;
    }
}
