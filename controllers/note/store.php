<?php

use Core\Validator;

$errors = [];

if (!Validator::TEXT($_POST['body'], 1, 100)) {
    $errors['message'] = "Text has to no more than 100 characters";
}

if (!empty($errors)) {
   return view(
        "note/create.view.php",
        [
            "heading" => "Create note",
            "errors" => $errors,
        ]
    );
}

$db->query(
    "insert into notes(body, user_id) values(:body, :user_id)",
    [
        "body" => $_POST["body"],
        "user_id" => 2,
    ]
);


header("Location: /notes");
exit;
