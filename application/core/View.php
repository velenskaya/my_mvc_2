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
		$this->path = $route['controller'].'/'.$route['action'];
		debug($this->path);
	}
	
	
	

}