<?php
namespace App\Controllers;

use App\Models\Admin;
use App\View\View;
use App\Models\Article;

class AccountController extends Controller
{
    
    public function indexAction()
    {
        $news = Article::findAll(); 
        $this->view->view('Main Page', compact('news'));
    }   
    
    public function loginAction() 
    {
        $this->view->view('Login Page!!!');
    }    
    
    
    public function adminAction() 
    {
        //var_dump($_POST);die();
        if (Admin::isAdmin($_POST)) {
            $this->view->redirect('/account/admin');
        } else {
            View::errorcode(5);
        };
    }
}

