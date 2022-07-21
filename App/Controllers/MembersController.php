<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;

class MembersController extends Controller
{

    public function action()
    {

        $this->view->members = User::findAll();
        $this->view->display(__DIR__ . '/../Templates/members.php');

    }
}