<?php

$heading = "Register";
$errors = [];

view("registration/create.view.php", [
    "heading"=>$heading,
    "errors" => $errors, 
]);