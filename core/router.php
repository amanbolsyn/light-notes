<?php

namespace Core;

use Core\Middleware\Guest;
use Core\Middleware\Auth;
use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    protected function add($method, $uri, $controller,)
    {
        $this->routes[] = [
            "method" => $method,
            "uri" => $uri,
            "controller" => $controller, 
            "middlewware" => null, 
        ];

        return $this;
    }


    public function get($uri, $controller)
    {
        return $this->add("GET", $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add("POST", $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add("DELETE", $uri, $controller);
    }

    public function patch($uri, $controller)
    {
        return $this->add("PATCH", $uri, $controller);
    }

    public function put($uri, $controller)
    {
        return $this->add("PUT", $uri, $controller);
    }

    public function route($uri, $requestMethod)
    {

        $requestMethod = strtoupper($requestMethod);

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $requestMethod) {

                Middleware::resolve($route["middleware"]);
                 
                require base_path('Http/controllers/'. $route['controller']);
                return;
            }
        }

        $this->abort();
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        require base_path("views/{$code}.php");
        die;
    }

    function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }
}
