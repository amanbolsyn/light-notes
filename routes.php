<?php

$router->get("/notes", "note/index.php")->only("auth");
$router->get("/note/create", "note/create.php")->only("auth");
$router->get("/note/edit", "note/edit.php")->only("auth");

$router->get("/note", "note/show.php")->only("auth");
$router->post("/note/create", "note/store.php")->only("auth");
$router->delete("/note", "note/destroy.php")->only("auth");
$router->patch("/note", "note/update.php")->only("auth");

$router->get("/register", "registration/create.php")->only("guest");
$router->post("/register", "registration/store.php")->only("guest");

$router->get("/login", "sessions/create.php")->only("guest");
$router->post("/login", "sessions/store.php")->only("guest");
$router->delete("/login", "sessions/destroy.php")->only("auth");

?>