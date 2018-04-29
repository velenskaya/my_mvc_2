<?php
namespace application\core;

abstract class View
{
	public $path; // путь
	public $layout ='default'; // шаблон


	public function __construct($route) 
	{
		$this->route = $route;
	}
	
	
	

}