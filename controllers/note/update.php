<?php

use core\App;
use core\Validator;

$db = App::container()->resolve("Core\Database");
$note_id = $_POST['id'];
$errors = [];


//find corresponding note in db
$note = $db->query("select * from notes where note_id = :note_id", [
    "note_id" => $note_id, 
])->fetchOrAbort();

//authorize the user
authorize($note['user_id'] === 2);
//validate new edited note
if (!Validator::TEXT($_POST['body'], 1, 100)) {
    $errors['message'] = "Text has to no more than 100 characters";
}

if (!empty($errors)) {
   return view(
        "note/edit.view.php",
        [
            "heading" => "Edit note",
            "errors" => $errors,
            "note" => $note,
        ]
    );
}


//update the note 
$db->query("update notes set body = :body where note_id = :note_id", [
    "body" => $_POST['body'],
    "note_id" => $note_id,
]);


//redirect the user
Header("Location: /notes");
exit;