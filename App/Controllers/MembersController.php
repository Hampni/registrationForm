<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;

class MembersController extends Controller
{
    public function action()
    {
        $members = User::findAll();
        $this->view->members = $members;
        $this->view->display(__DIR__ . '/../Templates/members.php');
    }
}
