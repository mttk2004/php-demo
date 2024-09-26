<?php

namespace Core;


use Core\Middleware\Middleware;
use Exception;

class Router
{
	public array $routes = [];
	
	private function add($method, $uri, $controller): Router
	{
		$this->routes[] = [
				'method' => $method,
				'uri' => $uri,
				'controller' => $controller,
				'middleware' => null,
		];
		
		return $this;
	}
	
	public function get($uri, $controller): Router
	{
		return $this->add('GET', $uri, $controller);
	}
	
	public function post($uri, $controller): Router
	{
		return $this->add('POST', $uri, $controller);
	}
	
	public function delete($uri, $controller): Router
	{
		return $this->add('DELETE', $uri, $controller);
	}
	
	public function patch($uri, $controller): Router
	{
		return $this->add('PATCH', $uri, $controller);
	}
	
	public function put($uri, $controller): Router
	{
		return $this->add('PUT', $uri, $controller);
	}
	
	public function only($key): Router
	{
		$this->routes[array_key_last($this->routes)]['middleware'] = $key;
		
		return $this;
	}
	
	/**
	 * @throws Exception
	 */
	public function route($uri, $method): void
	{
		// Find the route
		foreach ($this->routes as $route) {
			if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
				// Check if the route has middleware
				Middleware::resolve($route['middleware']);
				
				// Call the controller
				require_once BASE_PATH . "Http/controller/{$route['controller']}.php";
				exit;
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
