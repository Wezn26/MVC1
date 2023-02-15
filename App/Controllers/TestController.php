<?php
namespace App\Controllers;

use App\Models\Test;

class TestController extends Controller
{
    public function testAction() 
    {
        //var_dump($_POST);die();
        $test = new Test();
        $test->login = $_POST['login'];
        $test->password = $_POST['password'];
        $test->insert();
        
        $this->view->redirect('/');
    }
}

