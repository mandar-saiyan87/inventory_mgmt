<?php
$uri = parse_url($_SERVER["REQUEST_URI"])['path'];
// echoReq($uri);
$routes = [
  '/login' => 'controllers/login.php',
  '/' => 'controllers/index.php',
  '/products' => 'controllers/products.php',
  '/categories' => 'controllers/categories.php',
  '/orders' => 'controllers/orders.php',
];


function routeController($uri, $routes)
{

  if (!isset($_SESSION['logged_in']) && $uri !== '/login') {
    header("location: /login");
    exit();
  }

  if (isset($_SESSION['logged_in']) && $uri === '/login') {
    header("location: /");
    exit();
  }

  if (array_key_exists($uri, $routes)) {
    include $routes[$uri];
  } else {
    abort();
  }
}

routeController($uri, $routes);
