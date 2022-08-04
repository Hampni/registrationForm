<?php

namespace App\Controllers;

use App\Controller;
use App\Models\Countries;
use App\Models\User;

class RegistrationFormController extends Controller
{
    public function action()
    {
        $this->view->title = 'Registration form';
        $this->view->countries = Countries::findAll();
        $this->view->members = User::countUsers();
        $this->view->display(__DIR__ . '/../Templates/registrationForm.php');
    }
}
