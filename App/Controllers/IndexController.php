<?php

namespace App\Controllers;

class IndexController extends Controller
{
    public function indexAction() 
    {
        $this->view->view('Main Page');        
    }    
}

