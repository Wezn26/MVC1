<?php
namespace App\View;

class View
{
    public $path;
    public $route;

    public function __construct()
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }
    
    public function view($tmpl, $vars = [], $layout) 
    {
        extract($vars);
        $file = 'App/View/public/' . $this->path . '.php';
        if (file_exists($file)) {
            ob_start();
            require $file;
            $content = ob_get_clean();
            require 'App/View/public/layouts/' . $layout . '.php';
        }
    }
}

