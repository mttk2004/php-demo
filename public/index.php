<?php

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . './util/functions.php';

spl_autoload_register(function ($class) {
  require BASE_PATH . "./{$class}.php";
});

require_once BASE_PATH . './routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
