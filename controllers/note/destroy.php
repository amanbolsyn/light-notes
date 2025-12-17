<?php

$note_id = ($_POST)['note_id'];

$note = $db->query("select * from notes where note_id = :note_id", [
    "note_id" => $note_id, 
])->fetchOrAbort();


authorize($note['user_id'] === 2);

$db->query(
    "delete from notes where note_id = :note_id",
    [
        "note_id" => $note_id,
    ]
);

Header("Location: /notes");
exit;
