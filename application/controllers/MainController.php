<?php

namespace application\controllers;

use application\core\Controller;

class MainController extends Controller
{
	public function indexAction() 
	{
		/* передача различных данных во View
		$var = [
			'name'=>'Рома',
			'age'=>35,
			'kerns' =>[1,2,3],
		];
		*/

		$this->view->render('главная'); // передача данных в вид
	}

}
