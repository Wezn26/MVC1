<?php
namespace App\Controllers;

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
}

