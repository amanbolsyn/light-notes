<?php 

namespace Core\Middleware;

use Exception;

class Middleware{

     public const MAP = [
           "guest" =>   Guest::class, 
           "auth" =>    Auth::class,
       ];


       public static function resolve($key){ 
            
           if(!$key){
            return; 
           }

           $middleware= static::MAP[$key] ?? false;

           if(!$middleware){
            throw new Exception("Middleware is not difined " . $key);
           }

           (new $middleware)->handle();

        }
}