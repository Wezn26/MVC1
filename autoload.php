<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    
    if (file_exists($file)) {
        require $file;
    } else {
        die('Autoload ERROR!!!');
    }
});