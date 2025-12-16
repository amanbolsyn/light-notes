<?php

$note_id = $_GET["id"];

$note = $db->query("select * from notes where note_id = :note_id", 
   ["note_id"=> $note_id])->fetchOrAbort();

authorize($note['user_id'] === 2);

require ("views/note.view.php")
?>