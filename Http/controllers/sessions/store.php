<?php

use core\Middleware\Authenticator;
use Http\Forms\LoginForm;


//validating the credentials 
$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password'],
]);

$signedIn = (new Authenticator)->attempt($attributes['email'], $attributes['password']);

//attempting to log in 
if (! $signedIn) {
    $form->error('email', 'incorrect credentials')->throw();
}


redirect("/notes");
