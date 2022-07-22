<?php

namespace App\Controllers;

use App\Controller;
use App\Db;
use App\Models\User;
use App\Validator\Validator;

class SaveController extends Controller
{

    public function action()
    {
        if (empty($_SESSION['id'])) {

            $validator = new Validator();
            $validator->validate($_POST);

            if (empty($validator->getErrors())) {
                $user = new User();
                $user->fill($_POST);
                $user->save();
                $_SESSION['id'] = $user->id;
            } else {
                $errors = json_encode($validator->getErrors());
                echo $errors;
            }

        } else {
            $user = User::findById($_SESSION['id']);
            $user->fill($_POST);
            $user->save();
            echo $_SESSION['id'];
            session_destroy();
        }


    }
}