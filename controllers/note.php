<?php

$note_id = $_GET["id"];

$note = $db->query("select * from notes where note_id = :note_id", ["note_id"=> $note_id])->fetch();


//note doesn't exist in db 
if(! $note){
    abort();
}

//note does exist but under different user
if($note['user_id'] !== 2){
    //403 status code -> user is not authorized to view the content
    abort(Response::FORBIDDEN);
}

require ("views/note.view.php")
?>