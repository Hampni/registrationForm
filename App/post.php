<?php
require __DIR__ . '/../autoload.php';

try {
    $validate = \App\Validator\Validator::validate($_POST);
} catch (\App\Exeptions\ValidationExeption) {
    echo 'You did`t input all data. Please try again';
    die();
}



$db = new \App\Db();
//$sql = "INSERT INTO User (first_name, last_name , birthday, report_subject, country, phone, email)
//VALUES ('Illia','Prodanets','2001-08-12','marine navigation', 'Ukraine', '+380957430387', 'magnus9044@gmail.com')";
//$db->query($sql);

echo '<h1 style="font-size: 30px;">Данные успешно сохранены</h1>';
