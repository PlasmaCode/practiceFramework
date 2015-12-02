<?php

class Router {

    private $routes = [];


    public function get($url, $action, $method) {
        $this->routes[$url] = [$action, $method];
    }
    
    public function getController($url) {
        $url = $this->parse($url);
        
        //make sure there is a route specified for this url
        if(array_key_exists($url, $this->routes) === FALSE)
            return "404 not found";
        
        //make sure controller file exists
        $controller = $this->routes[$url][0];
        $method = $this->routes[$url][1];
        if($this->fileExists($controller) === FALSE)
            return "404 not found";
        
        //include controller and make sure class exists
        include_once(__DIR__ . '/../app/controllers/' . $controller . '.php');
        if(class_exists($controller) === FALSE)
            return "404 not found";
        
        //set controller and make sure method exists
        $controller = new $controller;
        if(method_exists($controller, $method) === FALSE)
            return "404 not found";
            
        return $controller->$method();
    }
    
    //ignore this, its for my wamp server
    private function parse($url) {
        //temp fix for my wamp server
        $url = str_replace("/recyclePHP/", "", $url);
        
        return $url;
    }
    
    //checks the existance of a controller file
    private function fileExists($controller) {
        $controllerFile = __DIR__ . '/../app/controllers/' . $controller . '.php'; 
        return file_exists($controllerFile);
    }

}
