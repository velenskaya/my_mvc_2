<?php

namespace application\controllers;

use application\core\Controller;

class AccountController extends Controller
{
	public function loginAction() 
	{
		//$this->view->redirect('https://habr.com/post/100137/'); //перенаправление на др страницу
		$this->render('Вход');
	}
	
	public function registerAction() 
	{
		$this->render('Регистрация');
	}
}
