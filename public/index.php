<?php

// Start session
session_start();

// Root path
const BASE_PATH = __DIR__ . '/../';

// functions.php is required for the functions used in the project
require_once BASE_PATH . './util/functions.php';

// Autoload classes
spl_autoload_register(function ($class) {
  require_once BASE_PATH . "./{$class}.php";
});

// Start session
require_once BASE_PATH . './bootstrap.php';

// Routes
require_once BASE_PATH . './routes.php';

// Get the URI and method
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($uri, $method);
