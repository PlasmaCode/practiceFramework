<?php

class Router
{
    private $routes = [];

    public function setGet($url, $controller, $method)
    {
        $this->routes[$url] = [$controller, $method];
    }
    
    public function getController($url)
    {
        $url = $this->parse($url);
        
        //make sure there is a route specified for this url
        if(array_key_exists($url, $this->routes) === false) {
            return "404 not found";
        }
        
        $controller = $this->routes[$url][0];
        $method = $this->routes[$url][1];
        
        $controller = new $controller;
            
        return $controller->$method();
    }
    
    //ignore this, its for my wamp server
    private function parse($url)
    {
        //temp fix for my wamp server
        $url = str_replace("/recyclePHP/", "", $url);
        return $url;
    }
}
