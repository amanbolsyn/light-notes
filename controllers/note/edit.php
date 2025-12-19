<?php

 use Core\App;

 $heading = "Edit note";
 $errors = [];
 $note_id = $_GET["id"];

 $db = App::container()->resolve("Core\Database");

 $note = $db->query("select * from notes where note_id = :note_id", [
    "note_id" => $note_id,
 ])->fetchOrAbort();

 authorize($note['user_id'] === $_SESSION['user']['id']);

view ("note/edit.view.php", [
     "heading" => $heading,
     "errors" => $errors, 
     "note" => $note,
]);