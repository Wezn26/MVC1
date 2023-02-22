<?php
namespace App\Controllers;

use App\Models\Admin;
use App\View\View;
use App\Models\Article;

class AdminController extends Controller
{
    
    public function indexAction() 
    {
        $news = Article::findAll();
        $this->view->view('Admin Page', compact('news'));
    }
    public function checkAction() 
    {
        //var_dump($_POST);die();
        if (Admin::isAdmin($_POST)) {
            $this->view->redirect('/admin/index');
        } else {
            View::errorcode(5);
        };
    }
}

