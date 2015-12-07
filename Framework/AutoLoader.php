<?php

class AutoLoader
{
    function __construct() {
        spl_autoload_register(array($this, 'controllerLoader'));
    }
    public function controllerLoader($controller)
    {
        $path = __DIR__ . '/../App/Controllers/';
        $file = $path . $controller . '.php';
        if(file_exists($file)) {
            include $file;
        }
    }
}
