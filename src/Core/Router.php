<?php
namespace App\Core;

class Router
{
    private array $routes = [];
    private array $middleware = [];

    public function get(string $path, array $handler, ?array $middleware = null): void
    {
        $this->addRoute('GET', $path, $handler, $middleware);
    }

    public function post(string $path, array $handler, ?array $middleware = null): void
    {
        $this->addRoute('POST', $path, $handler, $middleware);
    }

    public function put(string $path, array $handler, ?array $middleware = null): void
    {
        $this->addRoute('PUT', $path, $handler, $middleware);
    }

    public function delete(string $path, array $handler, ?array $middleware = null): void
    {
        $this->addRoute('DELETE', $path, $handler, $middleware);
    }

    private function addRoute(string $method, string $path, array $handler, ?array $middleware): void
    {
        $pattern = preg_replace('/\{(\w+)\}/', '(?P<$1>[^/]+)', $path);
        $pattern = '#^' . $pattern . '$#';

        $this->routes[] = [
            'method'     => $method,
            'pattern'    => $pattern,
            'handler'    => $handler,
            'middleware' => $middleware ?? [],
        ];
    }

    public function group(array $middleware, callable $callback): void
    {
        $previous = $this->middleware;
        $this->middleware = array_merge($this->middleware, $middleware);
        $callback($this);
        $this->middleware = $previous;
    }

    public function dispatch(string $method, string $uri): void
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $uri = rtrim($uri, '/') ?: '/';

        foreach ($this->routes as $route) {
            if ($route['method'] !== $method) continue;

            if (preg_match($route['pattern'], $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);

                $allMiddleware = array_merge($this->middleware, $route['middleware']);

                foreach ($allMiddleware as $mwClass) {
                    $middleware = new $mwClass();
                    $result = $middleware->handle();
                    if ($result !== null) {
                        return;
                    }
                }

                [$class, $action] = $route['handler'];
                $controller = new $class();
                call_user_func_array([$controller, $action], $params);
                return;
            }
        }

        http_response_code(404);
        $controller = new \App\Controllers\PageController();
        $controller->notFound();
    }
}
