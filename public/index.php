<?php

use Core\Database;
use Core\Router;
use Core\Container;
use Core\App;
use Core\Session;
use Core\ValidationException;

session_start();

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . "/vendor/autoload.php";
require BASE_PATH . "functions.php";

$container = new Container();

$container->bind("Core\Database", function () {
  $config = require base_path("config.php");
  
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
