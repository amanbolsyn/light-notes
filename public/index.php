<?php

use Core\Database;

const BASE_PATH = __DIR__ . "/../"; 


require BASE_PATH . ("functions.php");


spl_autoload_register(function ($class){
    $class = str_replace("\\", "/", $class);
      require base_path($class . ".php");
});

$config = require base_path("config.php");
$env = parse_ini_file(base_path(".env"));

$db = new Database($config['database'], "root", $env['DB_PASSWORD']);
require base_path("core/router.php");

?>
