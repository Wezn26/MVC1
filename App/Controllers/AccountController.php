<?php
namespace App\Controllers;

use App\Models\Test;

class AccountController extends Controller
{
    public function loginAction() 
    {
        $this->view->view('Login Page!!!');
    }
    
    public function registerAction() 
    {        
        $this->view->view('Registration Page!!!');
    }
    
    public function adminAction() 
    {
        $content = Test::findAll();
        $this->view->view('Admin Page!!!', compact('content'));
    }
}

