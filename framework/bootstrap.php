<?php

//include routing file
require(__DIR__ . '/Router.php');
$route = new Router();

//set a test GET route (url, controller, method)
$route->get("test", "testingController", "testMethod");

var_dump($route->getController($_SERVER['REQUEST_URI']));