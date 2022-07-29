<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;

class MembersController extends Controller
{
    public function action()
    {
        $members = User::findAll();
        foreach ($members as $member) {
            if (!file_exists(__DIR__ . '/../../Public/Images/' . $member->photo)) {
                $member->photo = 'default.png';
            } elseif ($member->photo == null) {
                $member->photo = 'default.png';
            }
        }
        $this->view->members = $members;
        $this->view->display(__DIR__ . '/../Templates/members.php');
    }
}
