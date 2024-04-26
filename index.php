<?php
// echo 'This is app entry';
require_once('fns.php');
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];

$routes = [
  '/' => 'controllers/index.php',
  '/products' => 'controllers/products.php',
  '/categories' => 'controllers/categories.php',
  '/orders' => 'controllers/orders.php',
];


if (array_key_exists($uri, $routes)) {
  include $routes[$uri];
} else {
  abort();
}
