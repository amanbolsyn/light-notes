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

?>