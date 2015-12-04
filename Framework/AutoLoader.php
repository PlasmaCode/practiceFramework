<?php

class AutoLoader
{
    function __construct() {
        spl_autoload_register(array($this, 'controllerLoader'));
    }
    public function controllerLoader($controller)
    {
        $path = __DIR__ . '/../App/Controllers';
        include $path . '/' . $controller . '.php';
    }
}
