<?php

function dd($var) {
  echo '<pre>';
  var_dump($var);
  echo '</pre>';
  die();
}

function urlIs($url) {
  $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
  return $uri === $url;
}

function authorize($condition, $statusCode = ResponseCode::FORBIDDEN) {
  if (!$condition) {
    abort($statusCode);
  }
}