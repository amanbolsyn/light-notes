<?php

$heading = "Create note";
$errors = [];

view("note/create.view.php",
    [
        "heading" => "Create note",
        "errors" => $errors, 
    ]
);
