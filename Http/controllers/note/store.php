<?php

use Core\Validator;
use Core\App;

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

$db = App::container()->resolve("Core\Database");

$db->query(
    "insert into notes(body, user_id) values(:body, :user_id)",
    [
        "body" => $_POST["body"],
        "user_id" => $_SESSION['user']['id'],
    ]
);


header("Location: /notes");
exit;
