<?php

use Core\App;

$note_id = ($_POST)['note_id'];

$db = App::container()->resolve("Core\Database");


$note = $db->query("select * from notes where note_id = :note_id", [
    "note_id" => $note_id, 
])->fetchOrAbort();


authorize($note['user_id'] === $_SESSION['user']['id']);

$db->query(
    "delete from notes where note_id = :note_id",
    [
        "note_id" => $note_id,
    ]
);

Header("Location: /notes");
exit;
