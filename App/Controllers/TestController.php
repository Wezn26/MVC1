<?php
namespace App\Controllers;

use App\Models\Test;
use App\Models\Article;

class TestController extends Controller
{
    
    public function indexAction()
    {
        $content = Test::findAll();
        $this->view->view('Test Page', compact('content'));        
    }
    
    public function articleAction()
    {
        $article = Test::findById($_GET['id']);
        $this->view->view('Article!!!', compact('article'));
    }

    public function testAction() 
    {
        //var_dump($_POST);die();
        $test = new Test();
        $test->login = $_POST['login'];
        $test->password = $_POST['password'];
        $test->save();
        
        $this->view->redirect('/');
    }
}

