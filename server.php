<?php
require("functions.php");
require("Response.php");
require("Database.php");
$config = require("config.php");
$env = parse_ini_file(".env");
$db = new Database($config['database'], "root", $env['DB_PASSWORD']);
require("router.php");
?>
