<?php

function urlIs($url) {
  $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
  return $uri === $url;
}