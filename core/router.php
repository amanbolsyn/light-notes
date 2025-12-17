<?php

namespace Core;

class Router
{


    protected $routes = [];
    protected $db; 

    function __construct($db)
    {
        $this->db = $db; 
    }

    protected function add($method, $uri, $controller) {
        $this->routes[] = compact("method", "uri", "controller");
    }


   public function get($uri, $conroller)
    {
        $this->add("GET", $uri, $conroller);
    }

    public function post($uri, $conroller)
    {
        $this->add("POST", $uri, $conroller);
    }

    public function delete($uri, $conroller)
    {
        $this->add("DELETE", $uri, $conroller);
    }

    public function patch($uri, $conroller)
    {
        $this->add("PATCH", $uri, $conroller);
    }

    public function put($uri, $conroller)
    {
        $this->add("PUT", $uri, $conroller);
    }

    public function route($uri, $requestMethod){

          $requestMethod = strtoupper($requestMethod);

          foreach($this->routes as $route){
                if($route['uri'] === $uri && $route['method'] === $requestMethod){

                    $db = $this->db;
                    require base_path($route['controller']);
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




}
