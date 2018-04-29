<?php

//подключение файла Dev.php

require_once 'application/lib/Dev.php';

use application\core\Router; // использовать класс Router

//функция автозагрузки
//spl_autoload_register() позволяет задать несколько реализаций метода автозагрузки. Она создает очередь из функций автозагрузки в порядке их определения в скрипте, тогда как встроенная функция __autoload() может иметь только одну реализацию.
// Начиная с версии PHP 5.3.0 можно использовать анонимные функции

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if (file_exists($path)) {   // file_exists - Проверяет существование указанного файла или каталога
    require $path;
    }
});

session_start(); //Стартует новую сессию, либо возобновляет существующую

$router = new Router;
$router->run();
