<?php
namespace application\core;

 class View
{
	public $path; // путь
	public $route;
	public $layout ='default'; // шаблон по умолчанию 'default'

	public function __construct($route) 
	{
		$this->route = $route;
		// формирование пути по которому находится маршрут
		$this->path = $route['controller'].'/'.$route['action'];
		//debug($this->path);
	}
	public function render($title, $var = []) 
	{
		extract($var); //Импортирует переменные из массива в текущую таблицу символов
		$path = 'application/views/'.$this->path.'.php'; 
		if (file_exists($path)) {
			ob_start(); //Включение буферизации вывода
			require_once $path;
			$content = ob_get_clean(); //ob_get_clean Получить содержимое текущего буфера и удалить его
			require_once 'application/views/layouts/'.$this->layout.'.php';
		} else {
			//echo 'Вид не найден';
			throw new \Exception('View not found!');
		}
		
	}

	public function redirect($url) //будет один параметр $url куда будет идти перенаправление
	{
		header('location: '.$url); //отправили заголовок браузеру
		exit;
	}

	public static function errorCode($code)
	{
		http_response_code($code); //Получает или устанавливает код ответа HTTP
		$path = 'application/views/errors/'.$code.'.php';
		if (file_exists($path)) {
			require_once $path;
		}
		exit; //чтобы остановить код после выброса ошибки
	}

	

}