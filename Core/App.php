<?php

namespace Core;

class App
{
	private static Container $container;
	
	public static function setContainer(Container $container): void
	{
		self::$container = $container;
	}
	
	public static function getContainer(): Container
	{
		return self::$container;
	}
	
	public static function resolve($key)
	{
		return self::$container->resolve($key);
	}
}
