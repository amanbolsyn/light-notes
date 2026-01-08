<?php


namespace Http\Forms;

use Core\Validator;

class LoginForm
{

    protected $errors = [];

    public function validate($email, $password)
    {


        if (!Validator::Email($email)) {
            $this->errors['email'] = "invalid email";
        }

        if (!Validator::Text($password)) {
            $this->errors['password'] = "password was not provided";
        }

        return empty($this->errors); 
    }

    public function errors(){
        return $this->errors; 
    }
}
