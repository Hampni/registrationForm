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
        $body = file_get_contents('php://input');
        $formData = json_decode($body, true);

        if (empty($_SESSION['id'])) {
            $validator = new Validator();
            $validator->validate($formData);

            if (empty($validator->getErrors())) {
                $user = new User();
                $user->fill($formData);
                $user->save();
                $_SESSION['id'] = $user->id;
                echo 'ok';
            } else {
                $errors = json_encode($validator->getErrors());
                echo $errors;
            }
        } else {
            $validator = new Validator();
            $validator->validate($formData);

            if (empty($validator->getErrors())) {
                $user = User::findById($_SESSION['id']);
                $user->fill($formData);
                $user->save();
                session_destroy();
                echo 'ok';
            } else {
                $errors = json_encode($validator->getErrors());
                echo $errors;
            }
        }
    }
}
