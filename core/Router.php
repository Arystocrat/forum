<?php
class Router {
    private array $routes = [];
    public function add(string $uri, string $filePath): void
    {
        $this->routes[$uri] = $filePath;
    }

    public function dispatch(string $uri): void
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        if(array_key_exists($uri, $this->routes)) {
            require_once $this->routes[$uri];
        } else {
            $this->abort();
        }
    }

    protected function abort(int $code = 404)
    {
        http_response_code($code);
        require_once __DIR__ . '/../app/Controllers/404.php';
        die();
    }
}