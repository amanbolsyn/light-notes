<?php


namespace Http\Forms;

use core\ValidationException;
use Core\Validator;


class LoginForm
{

    protected $errors = [];

    public function __construct(public array $attributes)
    {
          if (!Validator::Email($attributes['email'])) {
            $this->errors['email'] = "invalid email";
        }

        if (!Validator::Text($attributes['password'])) {
            $this->errors['password'] = "password was not provided";
        }

        return empty($this->errors); 
    }

    public static function validate($attributes)
    {

        $instance = new static($attributes);

        if($instance->failed()){
            $instance->throw(); 
        }

        return $instance;

    }

    public function failed(){
       return count($this->errors);
    }

    public function throw(){
      ValidationException::throw($this->errors(), $this->attributes);
    }

    public function errors(){
        return $this->errors; 
    }

    //adding custom error message 
    public function error($field, $message){

           $this->errors[$field] = $message; 

           return $this;
    }
}
