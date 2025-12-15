<?php
require("functions.php");
// require("router.php");
$config = require("config.php");
$env = parse_ini_file(".env");
require("Database.php");

$db = new Database($config['database'], "root", $env['DB_PASSWORD']);

// $note_id = $_GET['id'];
$query = "select * from notes";
$notes = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
dd($notes);
?>
