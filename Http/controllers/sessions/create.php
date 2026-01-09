<?php

use Core\Session;

$heading = "Log in";

view ("sessions/create.view.php", [
    "heading" => $heading,
    "errors" => Session::get('errors'),
])

?>