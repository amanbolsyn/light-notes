<?php

use core\Middleware\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

$form = new LoginForm;

//validating the credentials 
if ($form->validate($email, $password)) {

    $auth = new Authenticator();

    //attempting to log in 
    if ($auth->attempt($email, $password)) {
        redirect("/notes");
    }

    $form->error('email', 'incorrect credentials');
    $form->error('password', 'incorrect credentials');

}

//failed to log in 
return view("sessions/create.view.php", [
    "heading" => "Login",
    "errors" => $form->errors(),
]);
