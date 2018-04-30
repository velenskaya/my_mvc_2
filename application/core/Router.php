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
 				$this->params = $params;
 				return true;
 			}
 		}
 		return false;
  	}

 	public function run() {   //функция для запуска
 		if ($this->match()) {
 			$path ='application\controllers\\'.ucfirst($this->params['controller']).'Controller';
 			if (class_exists($path)) {
 				$action = $this->params['action'].'Action';
 				if (method_exists($path, $action)) {
 					$controller =  new $path($this->params);  
 					$controller->$action();
 				} else {
 					echo 'Не найден екшен:'.$action;
 				}
  		} else {
 			echo 'не найден контроллер:'.$path;
 		}
 	} else {
 		echo 'маршрут не найден';
 	}

  }
}
// подключение контроллера и вызов нужного действия