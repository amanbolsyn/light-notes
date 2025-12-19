<?php


$_SESSION = []; 
session_destroy(); //destroys the session from the server; 

//delete cookie from the browser 
$params = session_get_cookie_params();
setcookie("PHPSESSID", '', time()-3600, $params['path'], $params['domain'] );

header("location: /register"); //redirect
exit();