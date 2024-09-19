<?php 

$routes = [
  '/' => 'index',
  '/about' => 'about',
  '/contact' => 'contact',
];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if (array_key_exists($uri, $routes)) {
  $view = $routes[$uri];
  include_once('view/' . $view . '.view.php');
} else {
  include_once('view/404.view.php');
}

function routeToController($uri, $routes) {
  if (array_key_exists($uri, $routes)) {
    $view = $routes[$uri];
    include_once('view/' . $view . '.view.php');
  } else {
    include_once('view/404.view.php');
    die();
  }
}

routeToController($uri, $routes);