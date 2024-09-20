<?php 

$routes = [
  '/' => 'home',
  '/about' => 'about',
  '/contact' => 'contact',
  '/notes' => 'notes',
];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


function routeToController($uri, $routes) {
  if (array_key_exists($uri, $routes)) {
    $view = $routes[$uri];
    require_once(__DIR__ . '/controller/' . $view . '.php');
  } else {
    require_once(__DIR__ . '/view/404.view.php');
    die();
  }
}

routeToController($uri, $routes);