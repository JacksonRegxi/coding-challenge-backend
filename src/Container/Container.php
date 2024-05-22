<?php

namespace App\Container;

class Container
{

    private static array $instances = [];

    public static function singleton(string $class, callable|string|null $construction = null): mixed
    {
        if (!array_key_exists($class, self::$instances)) {
            match (true) {
                is_null($construction) => self::$instances[$class] = new $class(),
                is_string($construction) => self::$instances[$class] = new $construction(),
                is_callable($construction) => self::$instances[$class] = $construction(),
            };
        }

        return self::$instances[$class];
    }

    public static function resolve(string $class): mixed
    {
        return self::$instances[$class] ?? null;
    }
}