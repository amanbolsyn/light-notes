<?php

function dd($value){
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}

function authorize($isAuth, $status = 403){
   if(!$isAuth){
     abort(Response::FORBIDDEN);
   }
}

function base_path($path){
  return BASE_PATH . $path; 
}

function view($path, $data=[])
{
   extract($data);
   require base_path( "views/" . $path);
}
?>