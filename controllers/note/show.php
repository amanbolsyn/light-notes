<?php

use Core\App; 

$heading = "Note";
$note_id = $_GET["id"];

$db = App::container()->resolve("Core\Database");

$note = $db->query("select * from notes where note_id = :note_id", 
   ["note_id"=> $note_id])->fetchOrAbort();

authorize($note['user_id'] === 2);

view("note/show.view.php", [
    "heading" => $heading,
    "note" => $note,
])
?>