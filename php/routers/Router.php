<?php

namespace php\routers;

use Closure;

class Router
{
    private array $routes = [];

    public function add(string $path, Closure $handler): void
    {
        $this->routes[$path] = $handler;
    }
    public function dispatch(string $path): void
    {
        if (array_key_exists($path,$this->routes)) {
            $handler = $this->routes[$path];

            call_user_func($handler);
        } else {
            echo "Page not found: $path";
        }
    }
}