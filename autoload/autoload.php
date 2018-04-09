<?php

namespace autoload;

class Autoload
{
    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class)
    {
        $path = str_replace('\\', '/', $class);
        require $path . ".php";
    }
}