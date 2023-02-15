<?php

namespace App\Controllers;

use App\Models\Test;

class IndexController extends Controller
{
    public function indexAction() 
    {
        $content = Test::findAll();
        $this->view->view('Main Page', compact('content'));        
    }    
}

