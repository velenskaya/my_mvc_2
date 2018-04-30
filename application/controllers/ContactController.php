<?php

namespace application\controllers;

use application\core\Controller;

class ContactController extends Controller
{
	public function contactsAction() 
	{
		$this->view->render('страница с контактами');
	}

}
