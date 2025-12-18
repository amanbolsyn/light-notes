<?php

use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

//validate the form values
if (! Validator::Email($email)) {
    $errors['email'] = "unvalid email address";
};

if (!Validator::Text($password, 7, 15)) {
    $errors['password'] = "password has to be at least 7 characters long and maximum 15";
}

if (!empty($errors)) {
    return view("registration/create.view.php", [
        "heading" =>  "Register",
        "errors" => $errors,
    ]);
}


$db = App::container()->resolve("Core\Database");

//check if the user already exists
$user = $db->query("select * from users where email = :email", [
    "email" => $email,
])->fetch();

//if yes, redirect to login page
if ($user) {
    $errors['email'] = "email is already in use";
    return view("registration/create.view.php", [
        "heading" => "Register",
        "errors" => $errors,
    ]);
} else {
    //if not, create new user by saving to inot database
    $db->query("insert into users(email, password) values (:email, :password)", [
        "email" => $email,
        "password" => $password,
    ]);

    //Mark that user is logged in
    $_SESSION['logged_in'] = true;
    $_SESSION['user'] = [
        'email' => $email,
    ];

    //Redirect 
    header("location: /notes");
    exit();
}
