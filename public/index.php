<?php

use Core\Database;
use Core\Router;
use Core\Container;
use Core\App;

const BASE_PATH = __DIR__ . "/../";

require BASE_PATH . ("functions.php");

spl_autoload_register(function ($class) {
  $class = str_replace("\\", "/", $class);
  require base_path($class . ".php");
});

$container = new Container();

$container->bind("Core\Database", function() {
  $config = require base_path("config.php");
  $env = parse_ini_file(base_path(".env"));
  return new Database($config['database'], "root", $env['DB_PASSWORD']);
});

App::setContainer($container);

$router = new Router();
require base_path("routes.php");
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST['__method'] ?? $_SERVER["REQUEST_METHOD"];

$router->route($uri, $method);
