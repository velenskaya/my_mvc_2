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
		
		if (file_exists('application/views/'.$this->path.'.php')) {
			ob_start(); //Включение буферизации вывода
			require_once 'application/views/'.$this->path.'.php';
			$content = ob_get_clean(); //ob_get_clean Получить содержимое текущего буфера и удалить его
			require_once 'application/views/layouts/'.$this->layout.'.php';
		} else {
			//echo 'Вид не найден';
			throw new Exception('View not found!');
		}
		
	}
	
	public static function errorCode($code)
	{
		http_response_code($code) //Получает или устанавливает код ответа HTTP
		require_once 'application/views/errors/'.$code.'php';
		exit; //чтобы остановить код после выброса ошибки
	}

}