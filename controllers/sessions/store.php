<?php

use Core\Validator;
use Core\App; 

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];


if(!Validator::Email($email)){
    $errors['email'] = "Unvalid email";
}

if(!Validator::Text($password)){
    $errors['password'] = "password was not provided";
}

if(!empty($errors)) {
     return view("sessions/create.view.php", [
        "heading" =>"Login",
        "errors" => $errors, 
     ]); 
}

$db = App::container()->resolve("Core\Database");

$user = $db->query("select * from users where email = :email", [
    "email" => $email, 
])->fetch();

if($user){
    if(password_verify($password, $user['password'])){
         $_SESSION['user'] = [
            "id" => $user['id'],
         ];

         header("location: /notes"); 
    } else {
        $errors['password'] = "password incorect"; 
    }
} else {
    $errors['email'] = "email was not registered";
}

if(!empty($errors)) {
     return view("sessions/create.view.php", [
        "heading" =>"Login",
        "errors" => $errors['email'] = "", 
     ]); 
}

?>