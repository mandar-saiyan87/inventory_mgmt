<?php

function echoReq($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";

  die();
}

function uriCheck($value)
{
  return $_SERVER["REQUEST_URI"] === $value;
}
