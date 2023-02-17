<?php
namespace App\Controllers;

use App\Models\Admin;
use App\View\View;

class AdminController extends Controller
{
    public function checkAction() 
    {
        //var_dump($_POST);die();
        if (Admin::isAdmin($_POST)) {
            $this->view->redirect('/account/admin');
        } else {
            View::errorcode(5);
        };
    }
}

