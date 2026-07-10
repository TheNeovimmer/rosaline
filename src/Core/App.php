<?php
namespace App\Core;

spl_autoload_register(function (string $class) {
    $prefix = 'App\\';
    $baseDir = __DIR__ . '/../../src/';

    if (strncmp($prefix, $class, strlen($prefix)) !== 0) return;

    $relativeClass = substr($class, strlen($prefix));
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

class App
{
    private Router $router;
    private array $config;

    public function __construct()
    {
        $this->config = require __DIR__ . '/../../config/app.php';
        $this->router = new Router();
        $this->initSession();
        $this->registerRoutes();
    }

    private function initSession(): void
    {
        Session::start();
    }

    private function registerRoutes(): void
    {
        $router = $this->router;
        require __DIR__ . '/../../routes/web.php';
    }

    public function run(): void
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];

        try {
            $this->router->dispatch($method, $uri);
        } catch (\Throwable $e) {
            if ($this->config['debug']) {
                echo '<h1>Error</h1>';
                echo '<p>' . htmlspecialchars($e->getMessage()) . '</p>';
                echo '<pre>' . htmlspecialchars($e->getTraceAsString()) . '</pre>';
            } else {
                http_response_code(500);
                $this->router->dispatch('GET', '/500');
            }
        }
    }
}
