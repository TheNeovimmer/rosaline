<?php
namespace App\Core;

class View
{
    public static function render(string $view, array $data = [], string $layout = 'front'): void
    {
        extract($data);

        $viewPath = __DIR__ . '/../../views/' . $view . '.php';
        $layoutPath = __DIR__ . '/../../views/layouts/' . $layout . '.php';

        if (!file_exists($layoutPath)) {
            throw new \RuntimeException("Layout not found: {$layout}");
        }

        if (!file_exists($viewPath)) {
            throw new \RuntimeException("View not found: {$view}");
        }

        $app = (require __DIR__ . '/../../config/app.php');
        $baseUrl = rtrim($app['url'], '/');

        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        require $layoutPath;
    }

    public static function renderPartial(string $view, array $data = []): void
    {
        extract($data);
        $viewPath = __DIR__ . '/../../views/' . $view . '.php';
        if (!file_exists($viewPath)) {
            throw new \RuntimeException("View not found: {$view}");
        }
        require $viewPath;
    }
}
