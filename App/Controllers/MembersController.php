<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;

class MembersController extends Controller
{
    public function action()
    {
        $amountOfContent = 7;
        $pages = ceil(User::countUsers() / $amountOfContent);

        $pageNumber = $_GET['page'] ?? 1;
        $offset = ($pageNumber - 1) * $amountOfContent;
        $members = User::getPaginatedData($offset, $amountOfContent);

        $this->view->title = 'All members';
        $this->view->p = $pageNumber;
        $this->view->pages = $pages;
        $this->view->members = $members;
        if ($pageNumber > $pages) {
            $this->view->display(__DIR__ . '/../Templates/Errors/error404.php');
        } else {
            $this->view->display(__DIR__ . '/../Templates/members.php');
        }
    }
}
