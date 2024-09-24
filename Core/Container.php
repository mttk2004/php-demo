<?php

namespace Core;

class Container
{
	private array $bindings = [];
	
	public function bind($key, $value): void
	{
		$this->bindings[$key] = $value;
	}
	
	/**
	 * @throws \Exception
	 */
	public function resolve($key)
	{
		if (!array_key_exists($key, $this->bindings)) {
			throw new \Exception("{$key} is not bound in the container");
		}
		
		return call_user_func($this->bindings[$key]);
	}
}
