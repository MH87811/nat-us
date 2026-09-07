<?php

namespace Router;

class Router
{
    private array $routes = [];

    public function add(string $method, string $path, callable $handler)
    {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler
        ];
    }

    public function run()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $url = parse_url($_SERVER['REQUEST_URI']);

        foreach ($this->routes as $route) {
            if ($route['method'] == $method && $route['path'] == $url['path']) {
                call_user_func($route['handler']);
                return;
            }
        }
        http_response_code(404);
        echo "404";
    }
}