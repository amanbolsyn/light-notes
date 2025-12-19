<?php  

use Core\App;

$db = App::container()->resolve("Core\Database");
$heading = "All notes";

$notes = $db->query("select * from notes where user_id = :user_id",  [
    "user_id" => $_SESSION['user']['id'],
])->getAll();

view("/note/index.view.php", [
    "heading" => $heading,
    "notes" => $notes,
]);
?>