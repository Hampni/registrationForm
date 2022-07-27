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
            $uploaddir = './Public/Images';

            // cоздадим папку если её нет
            if (!is_dir($uploaddir)) mkdir($uploaddir, 0777);

            $files = $_FILES; // полученные файлы
            $done_files = array();

            // переместим файлы из временной директории в указанную
            foreach ($files as $file) {
                $file_name = $file['name'];

                if (move_uploaded_file($file['tmp_name'], "$uploaddir/$file_name")) {
                    $done_files[] = realpath("$uploaddir/$file_name");
                    $user = User::findById($id);
                    $user->fill(['photo' => $file_name]);
                    $user->save();
                } else {
                    $file_name = 'default.png';
                    $user = User::findById($id);
                    $user->fill(['photo' => $file_name]);
                    $user->save();
                }
            }

            $data = $done_files ? array('files' => $done_files) : array('error' => 'Ошибка загрузки файлов.');

            // добавляем данные в столбец фото
            if ($file_name == '') {
                $file_name = 'default.png';
                $user = User::findById($id);
                $user->fill(['photo' => $file_name]);
                $user->save();
            }
            die(json_encode($id));
        }
    }
}
