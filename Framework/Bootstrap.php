<?php

//include and call autoloader class
include __DIR__ . '/AutoLoader.php';

new AutoLoader;

//include routing file
include __DIR__ . '/Router.php';
$route = new Router();

//set a GET http route (url, controller, method)
$route->setGet("test", "TestingController", "testMethod");
$route->setGet("hello", "TestingController", "helloMethod");

var_dump($route->getController($_SERVER['REQUEST_URI']));