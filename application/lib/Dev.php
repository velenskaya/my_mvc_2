<?php 
//включение ошибок на экран, 1- значит все 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//активируем отчет об ошибках c флагoм E_ALL _т.е выводить все ошибки
error_reporting(E_ALL);


//функция для дебага 
function debug($str) {
	echo '<pre>';
	var_dump($str);
	echo '</pre>';
	exit; //выход
}