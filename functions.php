<?php

use Core\Response;

function dd($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die();
}


function abort($code = 404)
{
  http_response_code($code);
  require base_path("views/{$code}.php");
  die;
}


function authorize($isAuth, $status = 403)
{
  if (!$isAuth) {
    abort(Response::FORBIDDEN);
  }
}

function base_path($path)
{
  return BASE_PATH . $path;
}

function view($path, $data = [])
{
  extract($data);
  require base_path("views/" . $path);
}


function redirect($path)
{
  header("location: {$path}");
  exit();
}

function old($key, $default = ''){

  return Core\Session::get('old')[$key] ?? $default; 

}

?>