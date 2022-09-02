<?php

namespace App\Controllers;

use App\Controller;
use App\Models\User;

class ImageController extends Controller
{
    public function action()
    {
        if (isset($_POST['my_file_upload'])) {
            $id = $_SESSION['id'];
            $uploaddir = './src/Images';

            // create folder if does not exist
            if (!is_dir($uploaddir)) {
                mkdir($uploaddir, 0777);
            }

            $files = $_FILES; // received file

            //  move files from temp directory to specified directory
            foreach ($files as $file) {
                $file_name = $file['name'];
                move_uploaded_file($file['tmp_name'], "$uploaddir/$file_name");

                if ($file_name === '') {
                    $file_name = 'default.png';
                }
                $user = User::findById($id);
                $user->fill(['photo' => $file_name]);
                $user->save();
            }
            die(json_encode($id));
        }
    }

}
