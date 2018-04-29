<?php 
//массив - тут указываем страгицы (они же маршруты)
//будет просто возврат массива return

return [
	//название 1 страницы  будет массив 'account/login' в котором будет два значения
	'account/login' => [
		'controller' => 'account',
		'action' => 'login',
	],

	//название 2 страницы  будет массив 'news/show' в котором будет два значения

	'news/show' => [
		'controller' => 'news',
		'action' => 'show',
	]
];
