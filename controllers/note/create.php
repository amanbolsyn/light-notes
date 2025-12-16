<?php

use Core\Validator;

require base_path("core/Validator.php");

$heading = "Create note";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    if (!Validator::TEXT($_POST['body'], 1, 100)) {
        $errors['message'] = "Text has to no more than 100 characters";
    }

    if (empty($errors)) {
        $db->query(
            "insert into notes(body, user_id) values(:body, :user_id)",
            [
                "body" => $_POST["body"],
                "user_id" => 2,
            ]
        );
    }

    header("Location: /notes");
    exit;
}

view("note/create.view.php",
    [
        "heading" => "Create note"
    ]
);
