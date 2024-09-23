<?php

namespace Core;

class Router
{
	public array $routes = [];
	
	private function add($method, $uri, $controller): void
	{
		$this->routes[] = compact('method', 'uri', 'controller');
	}
	
	public function get($uri, $controller): void
	{
		$this->add('GET', $uri, $controller);
	}
	
	public function post($uri, $controller): void
	{
		$this->add('POST', $uri, $controller);
	}
	
	public function delete($uri, $controller): void
	{
		$this->add('DELETE', $uri, $controller);
	}
	
	public function patch($uri, $controller): void
	{
		$this->add('PATCH', $uri, $controller);
	}
	
	public function put($uri, $controller): void
	{
		$this->add('PUT', $uri, $controller);
	}
	
	public function route($uri, $method): void
	{
		// Find the route
		foreach ($this->routes as $route) {
			if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
				require_once BASE_PATH . "controller/{$route['controller']}.php";
			}
		}
		
		// If no route is found, abort with 404
		$this->abort();
	}
	
	protected function abort($code = 404): void
	{
		http_response_code($code);
		
		require_once BASE_PATH . "view/{$code}.view.php";
		exit;
	}
}
