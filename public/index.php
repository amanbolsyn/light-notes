<?php

use Core\Database;
use Core\Router;
use Core\Container;
use Core\App;
use core\Session;
use core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . ("functions.php");

spl_autoload_register(function ($class) {
  $class = str_replace("\\", "/", $class);
  require base_path($class . ".php");
});

$container = new Container();

$container->bind("Core\Database", function () {
  $config = require base_path("config.php");
  //password retrival 
  // $env = parse_ini_file(base_path(".env"));
  return new Database($config['database'], "root");
});

App::setContainer($container);

$router = new Router();
require base_path("routes.php");
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST['__method'] ?? $_SERVER["REQUEST_METHOD"];


try {
  $router->route($uri, $method);
} catch (ValidationException $exception) {
  //failed to log in 
  Session::flash("old", $exception->old);
  Session::flash("errors", $exception->errors);
  

  $router->previousUrl();
}

Session::unflash();
