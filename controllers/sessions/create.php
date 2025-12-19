<?php

$heading = "Log in";
$errors = [];

view ("sessions/create.view.php", [
    "heading" => $heading,
    "errors" => $errors,
])

?>