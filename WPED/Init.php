<?php

namespace WPED;

final class Init
{
	public static function get_services()
	{
		return [
            Base\Enqueue::class,
            Base\CustomPostTypeController::class,
            Base\MetaBoxController::class,
            Base\GraphQLController::class,
		];
	}

	public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    private static function instantiate($class)
    {
        $service = new $class;
        return $service;
    }
}