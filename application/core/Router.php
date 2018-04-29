<?php
 namespace application\core;

 class Router
 {
 	protected $routes = [];
 	protected $params = [];

 	public function __construct() {
 		//добавили в роутер два маршрута
 		$arr = require_once 'application/config/routes.php';
 		//перебираем массив
 		foreach ($arr as $key=>$value) {
 			$this->add($key, $value);
 		}
 		
 	}

 	//функция на добавление маршрута c двумя параметрами $route и $params
 	public function add($route, $params) { 
 		$route = '#^'.$route.'$#';
 		$this->routes[$route] = $params; 		 		 
 	}

 	public function match() {   //функция проверки есть ли такой маршрут
 		//получение текущего url
 		$url = trim($_SERVER['REQUEST_URI'], '/');

 		//перебор в цикле маршрутов из файла routes.php 
 		foreach ($this->routes as $route=>$params){
 			//поиск совпадения
 			if (preg_match($route, $url, $matches)) {
 				var_dump($matches);
 				//echo '12345';
 			}
 		}
 		
 	}

 	public function run() {   //функция на запуск
 		$this->match();
 	}

 }