<?php

namespace TestApp\Loader;

class Autoload
{
    public static function monAutoload($class)
    {
        $arrayCheminClass = explode("\\", $class);
        array_shift($arrayCheminClass);
        $stringCheminClass = implode('/', $arrayCheminClass);
        include($stringCheminClass . '.php');
    }
}
