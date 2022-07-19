<?php

namespace App\Controllers;

use App\Controller;

class RegistrationFormController extends Controller
{

    public function action()
    {
        $this->view->chart = require __DIR__ . '/../Templates/chart.php';
        $this->view->display(__DIR__ . '/../Templates/registrationForm.php');
        var_dump($_POST);
    }
}