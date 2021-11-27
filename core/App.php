<?php

namespace App\core;

use Exception;

class App
{
    protected static $registry = [];

    public static function bind($key, $value)
    {
        static::$registry[$key] = $value;
    }

    public static function resolve($key)
    {
        if (!array_key_exists($key, static::$registry)) {
            throw new Exception("{$key} could not be resolved in the container");
        }
        return static::$registry[$key];
    }
}
