<?php

// front controller 

// 1. общие настройки 
ini_set('display_errors', 1);
error_reporting(E_ALL);

// 2. подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/autoload.php');



// 4. вызов роутера
$router = new Router();
$router->run();
