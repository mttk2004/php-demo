<?php 

use Core\ResponseCode;

$routes = [
  '/' => 'home',
  '/about' => 'about',
  '/contact' => 'contact',
  '/notes' => 'notes/index',
  '/notes/create' => 'notes/create',
  '/note' => 'notes/show',
];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


function routeToController($uri, $routes) {
  if (array_key_exists($uri, $routes)) {
    $view = $routes[$uri];
    require_once(__DIR__ . '/../controller/' . $view . '.php');
  } else {
    abort(ResponseCode::NOT_FOUND);
  }
}

function abort($code = 404) {
  http_response_code($code);
  require_once(__DIR__ . '/../view/' . $code . '.view.php');
  die();
}

routeToController($uri, $routes);