<?php
namespace App\Controllers;

use App\Models\Admin;
use App\View\View;

class AccountController extends Controller
{
    public function loginAction() 
    {
        $this->view->view('Login Page!!!');
    }    
    
    
    public function adminAction() 
    {
        //var_dump($_POST);die();
        if (Admin::isAdmin($_POST)) {
            $this->view->redirect('/');
        } else {
            View::errorcode(5);
        };
    }
}

