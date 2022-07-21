<?php
session_start();
require __DIR__ . '/autoload.php';

$params = explode('/', $_SERVER['REQUEST_URI']);
$classes = explode('?', implode($params));

$ctrl = !empty($classes[0]) ? ucfirst($classes[0]) : 'RegistrationForm';
$class = '\App\Controllers\\' . $ctrl . 'Controller';

$controller = new $class;
$controller();

//var_dump($_SESSION);
