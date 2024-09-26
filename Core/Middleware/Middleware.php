<?php

namespace Core\Middleware;


use Exception;


class Middleware
{
	private const array MAP
			= [
					'auth' => Auth::class,
					'guest' => Guest::class,
			];
	
	/**
	 * @throws Exception
	 */
	public static function resolve($key): void
	{
		if (!$key) {
			return;
		}
		
		$middleware = self::MAP[$key] ?? null;
		if ($middleware) {
			(new $middleware)->handle();
		} else {
			throw new Exception("Middleware {$key} not found");
		}
	}
}
