<?php
namespace application\core;

 class View
{
	public $path; // путь
	public $route;
	public $layout ='default'; // шаблон

	public function __construct($route) 
	{
		$this->route = $route;
		// формирование пути по которому находится маршрут
		$this->path = $route['controller'].'/'.$route['action'];
		//debug($this->path);
	}
	public function render($title, $vars =[]) {
		ob_start();
		require_once 'application/views/'.$this->path.'.php';
		$content = ob_get_clean();
		require_once 'application/views/layouts/'.$this->layout.'.php';
	}
	
	

}