<?php
namespace App\Traits;

trait Singleton
{
    protected static $instance = null;
    
    public function give() 
    {
        if (null === static::$instance) {
            return static::$instance = new static;
        }
    }
}

