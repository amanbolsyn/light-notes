<?php

use Core\App;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];
$errors = [];

$form = new LoginForm;

if(! $form->validate($email, $password)) {
     return view("sessions/create.view.php", [
        "heading" =>"Login",
        "errors" => $form->errors(),
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