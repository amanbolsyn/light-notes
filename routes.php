<?php

$router->get("/notes", "controllers/note/index.php");
$router->get("/note/create", "controllers/note/create.php");
$router->get("/note/edit", "controllers/note/edit.php");


$router->get("/note", "controllers/note/show.php");
$router->post("/note/create", "controllers/note/store.php");
$router->delete("/note", "controllers/note/destroy.php");
$router->patch("/note", "controllers/note/update.php");



?>