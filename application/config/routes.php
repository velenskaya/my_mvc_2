<?php 
//массив - тут указываем страгицы (они же маршруты)
//будет просто возврат массива return

return [
	//главная страница  
	'' => [
		'controller' => 'main',
		'action' => 'index',
	],

	// страница с контактами
	'contacts' => [
		'controller' => 'contact',
		'action' => 'contacts',
	],

	//страница входа - массив 'account/login' в котором будет два значения
	'account/login' => [
		'controller' => 'account',
		'action' => 'login',
	],

	//страница регистрации  - массив 'account/register' в котором будет два значения
	'account/register' => [
		'controller' => 'account',
		'action' => 'register',
	],

	//страница новостей - массив 'news/show' в котором будет два значения

	'news/show' => [
		'controller' => 'news',
		'action' => 'show',
	]
 
];
