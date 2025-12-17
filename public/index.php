<?php

use Core\Database;
use Core\Router;

const BASE_PATH = __DIR__ . "/../"; 

require BASE_PATH . ("functions.php");

spl_autoload_register(function ($class){
    $class = str_replace("\\", "/", $class);
      require base_path($class . ".php");
});

$config = require base_path("config.php");
$env = parse_ini_file(base_path(".env"));

$db = new Database($config['database'], "root", $env['DB_PASSWORD']);

$router = new Router($db);
require base_path("routes.php");
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST['__method'] ?? $_SERVER["REQUEST_METHOD"];

$router->route($uri, $method);


?>
