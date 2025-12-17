<?php

$router->get("/notes", "controllers/note/index.php");
$router->get("/note", "controllers/note/show.php");
$router->get("/note/create", "controllers/note/create.php");

$router->post("/note/create", "conrollers/note/create.php");


?>