<?php

if (isset($_FILES['image'])) {
    if (move_uploaded_file($_FILES['image']['tmp_name'], dirname(dirname(__FILE__)) . '/' . $_FILES['image']['name '])) {
        echo 'ok';
    } else {
        echo 'nook';
    }
} else {
    echo 'not';
}


