<?php

use Core\ResponseCode;

function dd($var) {
  echo '<pre>';
  var_dump($var);
  echo '</pre>';
  die();
}

function urlIs($url): bool
{
  $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
  return $uri === $url;
}

function authorize($condition, $statusCode = ResponseCode::FORBIDDEN): void
{
  if (!$condition) {
    abort($statusCode);
  }
}

function abort(int $statusCode = 404): void
{
	http_response_code($statusCode);
	require_once(BASE_PATH . './view/' . $statusCode . '.view.php');
}


function view($view, $data): void
{
  extract($data);

	// check if view file exists
	if (!file_exists(BASE_PATH . './view/' . $view . '.view.php')) {
		abort(404);
	}
	
  require(BASE_PATH . './view/' . $view . '.view.php');
}
