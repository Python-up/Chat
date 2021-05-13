<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/login.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>DURKA</title>
</head>
<body>
    <header id="header">D U R K A</header>
    <form id="form" action="login.php" method="post">
        <input name="username" placeholder="Имя">
        <input name="password" type="password" placeholder="Пароль">
        <button id="button" type="submit">Войти</button>
    </form>
    <script src="js/vk-bridge.js"></script>
    <script>vkBridge.send('VKWebAppInit')</script>
</body>
</html>

<?php
// подключаемся к базе данных

$connect = mysqli_connect('localhost', 'root', 'root', 'chat_durka_bd');

	//Если форма авторизации отправлена...
	if ( !empty($_REQUEST['password']) and !empty($_REQUEST['username']) ) {
		//Пишем логин и пароль из формы в переменные (для удобства работы):
		$username = $_REQUEST['username']; 
		$password = $_REQUEST['password']; 

		/*
			Формируем и отсылаем SQL запрос:
		*/
		$query = 'SELECT*FROM users_chat_durka_bd WHERE username="'.$username.'" AND password="'.$password.'"';
		$result = mysqli_query($connect, $query); //ответ базы запишем в переменную $result. 
		$user = mysqli_fetch_assoc($result); //преобразуем ответ из БД в нормальный массив PHP

		//Если база данных вернула не пустой ответ - значит пара логин-пароль правильная
		if (!empty($user)) {

			//Стартуем сессию:
			session_start(); 

			//Пишем в сессию информацию о том, что мы авторизовались:
			$_SESSION['auth'] = true; 

			//Пишем в сессию логин и id пользователя (их мы берем из переменной $user!):
			$_SESSION['id'] = $user['id']; 
			$_SESSION['username'] = $user['username'];
			$_SESSION[header('Location: index.php')];
		} else {
			//Пользователь неверно ввел логин или пароль, выполним какой-то код.
            echo 'Неверно, ';		
		}
	}
?>