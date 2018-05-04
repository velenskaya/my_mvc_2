<?php
 namespace application\core;

 use application\core\View;
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
 				if (empty($params)) {
 				    throw new \LogicException('Empty params');
                }

                return true;
 			}
 		}

 		throw new \Exception('Route not found');
  	}

 	public function run() {   //функция для запуска
 		try {
            $this->match();
            $path = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            //var_dump($path);
            if (class_exists($path)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404); // :: - вызов статичного метода не создавая экземпляр класса
                }
            } else {
                View::errorCode(404);
            }
        } catch (\LogicException $e) {
            View::errorCode(401);
 	    } catch (\Exception $e) {
 		    View::errorCode(404); //если маршрут не найден;
 		}
  }
}
