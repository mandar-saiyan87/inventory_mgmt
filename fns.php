<?php

// print something
function echoReq($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";

  die();
}

// check url in addressbar
function uriCheck($value)
{
  return $_SERVER["REQUEST_URI"] === $value;
}

// Abort 404 page not found
function abort()
{
  http_response_code(404);
  include 'views/404.php';
}

