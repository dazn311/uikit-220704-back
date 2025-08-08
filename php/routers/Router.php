<?php

namespace php\routers;

use Closure;

class Router
{
    protected array $routes = [];
    protected string $uri;
    protected string $method;

    public function __construct()
    {
        $this->uri = trim(parse_url($_SERVER['REQUEST_URI'])['path'], '/');
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    public function add(string $path, Closure $handler): void
    {
        $this->routes[$path] = $handler;
    }
    
    public function add2method(string $uri, string $controller, string $method): void
    {
        $this->routes[] = [
            'uri'=>$uri,
            'controller'=>$controller,
            'method'=>$method,
        ];
    }
    
    public function get2method(string $uri, string $controller): void
    {
        $this->add2method($uri, $controller, 'GET');
    }
    
    public function post2method(string $uri, string $controller): void
    {
        $this->add2method($uri, $controller, 'POST');
    }

    public function match(): void
    {
        $matches = false;
        foreach ($this->routes as $route) {
            # code...
            if (($route['uri'] === $this->uri) && ($route['method'] === $this->method)) {
                $matches = true;
                break;
            }
        }

        if (!$matches) {
            // abort();
        }
    }
    
    public function dispatch(string $path): void
    {
        if (array_key_exists($path,$this->routes)) {
            $handler = $this->routes[$path];
            call_user_func($handler);
        } else {
            global $root_path2;
            require $root_path2 . '/pages/controllers/not-found-controller.php';
        }
    }
}