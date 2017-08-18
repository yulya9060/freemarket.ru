<?php

/*Маршрутизацию мы поместим в отдельный файл route.php в директорию core. 
В этом файле опишем класс Route, который будет запускать методы контроллеров, 
которые в свою очередь будут генерировать вид страниц.*/


class Route
{
	/*Объявление свойств и методов класса статическими позволяет обращаться к ним без создания экземпляра класса. 
	  Атрибут класса, объявленный статическим, не может быть доступен посредством экземпляра класса (но статический метод может быть вызван).*/
	static function start() 

	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		

/*Переменная $_SERVER - это массив, содержащий информацию, такую как заголовки, пути и местоположения скриптов. 
Записи в этом массиве создаются веб-сервером. 
Нет гарантии, что каждый веб-сервер предоставит любую из них; 
сервер может опустить некоторые из них или предоставить другие, не указанные здесь.*/

//explode - С помощью функции explode производится разделение адреса на составлющие.
//URI — последовательность символов, идентифицирующая абстрактный или физический ресурс.
//URL — это URI, который, помимо идентификации ресурса, предоставляет ещё и информацию о местонахождении этого ресурса. 

		$routes = explode('/', $_SERVER['REQUEST_URI']);
//создается массив $routes
		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = 'Controller_'.$controller_name;
		$action_name = 'action_'.$action_name;

		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "application/models/".$model_file;
		if(file_exists($model_path))
		{
			include "application/models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "application/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "application/controllers/".$controller_file;
		}
		else
		{
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;

		//проверяем существование метода action в данном классе controller	
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}
	
	}
	
	function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}