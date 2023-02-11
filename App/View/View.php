<?php

namespace App\View;

class View
{
    public $path;
    public $route;
    public $layout = 'default';

    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];        
    }
    
    public function view($title, $vars = []) 
    {
        extract($vars);
        $file = 'App/View/public/' . $this->path . '.php';
        if (file_exists($file)) {
            ob_start();
            require $file;
            $content = ob_get_clean();
            require 'App/View/public/layouts/' . $this->layout . '.php';
        } else {
            echo 'Not found view: ' . $this->path;
        }
    }
    
    public function redirect($url) 
    {
        header('Location: ' . $url);
        exit();
    }
    
    public static function errorcode($code) 
    {
        http_response_code($code);
        $file = require 'App/View/public/errors/' . $code . '.php';
        if (file_exists($file)) {
            require $file;
        }
        exit();
    }
}

