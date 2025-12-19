<?php

$router->get("/notes", "controllers/note/index.php")->only("auth");
$router->get("/note/create", "controllers/note/create.php")->only("auth");
$router->get("/note/edit", "controllers/note/edit.php")->only("auth");

$router->get("/note", "controllers/note/show.php")->only("auth");
$router->post("/note/create", "controllers/note/store.php")->only("auth");
$router->delete("/note", "controllers/note/destroy.php")->only("auth");
$router->patch("/note", "controllers/note/update.php")->only("auth");

$router->get("/register", "controllers/registration/create.php")->only("guest");
$router->post("/register", "controllers/registration/store.php")->only("guest");

$router->get("/login", "controllers/sessions/create.php")->only("guest");
$router->post("/login", "controllers/sessions/store.php")->only("guest");

?>