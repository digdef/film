<?php
require"config.php";
session_start();

function generateSalt() {
	$salt = '';
	$saltLength = 8;
	for($i=0; $i<$saltLength; $i++) {
		$salt .= chr(mt_rand(33,126));
	}
	return $salt;
}
$data =$_POST;
if (isset($data['do_login'])){
	if ( !empty($data['password']) and !empty($data['login']) ) {

		$login = $data['login']; 
		$password = $data['password']; 

		$query = 'SELECT*FROM users WHERE login="'.$login.'"';
		$result = mysqli_query($connection, $query); 

		$user = mysqli_fetch_assoc($result); 
		$user1 = R::findOne('users','login = ?', array($data['login']));

		if (!empty($user)) {

			$salt = $user['salt'];

			$saltedPassword = md5($password);

			if (password_verify($data['password'], $user1->password)) {

				session_start(); 

				$_SESSION['auth'] = true; 
				$_SESSION['id'] = $user['id']; 
				$_SESSION['login'] = $user['login'];

				if ( !empty($_REQUEST['remember']) and $_REQUEST['remember'] == 1 ) {
	
					$key = generateSalt(); 

					setcookie('login', $user['login'], time()+60*60*24*30); 
					setcookie('key', $key, time()+60*60*24*30); 

					$query = 'UPDATE users SET cookie="'.$key.'" WHERE login="'.$login.'"';
					mysqli_query($connection, $query);
				}
				header("location: index.php");
			}
			else {
				$errors[] = 'Введенный пароль неверен!';
			}
		} else {
			$errors[] = 'Такого пользователя не существует!';
		}
	}
}
if (empty($_SESSION['auth']) or $_SESSION['auth'] == false) {

	if ( !empty($_COOKIE['login']) and !empty($_COOKIE['key']) ) {

		$login = $_COOKIE['login']; 
		$key = $_COOKIE['key'];
		$query = 'SELECT*FROM users WHERE login="'.$login.'" AND cookie="'.$key.'"';
		$result = mysqli_fetch_assoc(mysqli_query($connection, $query)); 

		if (!empty($result)) {

			session_start(); 

			$_SESSION['auth'] = true; 
			$_SESSION['id'] = $user['id']; 
			$_SESSION['login'] = $user['login']; 
		}
	}
} else {
	header("location: account.php");
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/main.css"></link>
	<title>Look Later</title>
	<script src="js/granim.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>
	<canvas id="canvas-basic"></canvas> 
	<nav class="navbar navbar-expand-lg navbar-dark ">
		<a href="/" id="logo" >
			<span>
				Look Later
			</span>
		</a>
	</nav>

	<div id="box_registration" class="box">
		<form action="login.php" method="POST"> 
			<h1>Вход</h1>
			<input required="" type="text" name="login" placeholder="Логин">
			<input required="" type="password" name="password" placeholder="Пароль">
			<input type="submit" name="do_login" value="Вход">
			<div style="color: white">
				Запомнить <input name='remember' type='checkbox' value='1'>
			</div>
			
		</form>
		<input id="btn" type="submit" value="Регистрация" data-toggle="modal" data-target="#exampleModal">
		<a id="link1" href="verification.php">Забыл пароль!</a>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div>
					<form id="brm" class="box" action="login.php" method="POST">
						<h1>Регистрация</h1>
						<input required="Введите Логин" type="text" name="login" placeholder="Ваш Логин" value="<? echo @$data['login'] ?>">
						<input required="Введите Имя" type="text" name="name" placeholder="Ваше Имя" value="<? echo @$data['name'] ?>">
						<input required="Введите Email" type="email" name="email" placeholder="Ваш Email" value="<? echo @$data['email'] ?>">    
						<input minlength="7" required="Введите Пароль" type="password" name="password" placeholder="Пароль" value="<? echo @$data['password'] ?>">
						<input minlength="7" required="Подтвердите Пароль" type="password" name="password_2" placeholder="Подтвердите Пароль" value="<? echo @$data['password_2'] ?>">
						<input type="submit" name="do_signup" value="Регистрация">
					</form>	
				</div>			
			</div>
		</div>
	</div>
	
<?
$data =$_POST;
if (isset($data['do_login'])){
	$errors = array();
	$user = R::findOne('users','login = ?', array($data['login']));
	if ($user) {
		if (password_verify($data['password'], $user->password)){
			$_SESSION['logget_user'] = $user;
		}
		else{
			$errors[] = 'Введенный пароль неверен!';
		}
	}
	else{
		$errors[] = 'Такого пользователя не существует!';
	}
	if (! empty($errors)) {
		echo '<center><div id="reg_notifice" style="color: red; padding-top: 50px;position: relative;">'.array_shift($errors).'</div></center>';
	}
}
if (isset($data['do_signup'])) {
	$errors = array();
	if (trim($data['login']) == '') {
		$errors[] = 'Введите Логин!';
	}
	if (trim($data['email']) == '') {
		$errors[] = 'Введите Email!';
	}
	if (trim($data['name']) == '') {
		$errors[] = 'Введите Имя!';
	}
	if ($data['password'] == '') {
		$errors[] = 'Введите Пароль!';
	}
	if ($data['password_2'] != $data['password']) {
		$errors[] = 'Подтвердите Пароль!';
	}
	if (R::count('users', "login = ?", array($data['login'])) > 0) {
		$errors[] = 'Пользователь с таким логином уже существует!';
	}
	if (empty($errors)) {
		mysqli_query($connection, "INSERT INTO `users` (`login`,`email`,`name`,`password`) VALUES ('".$data['login']."', '".$data['email']."', '".$data['name']."', '".password_hash($data['password'], PASSWORD_DEFAULT)."')");
		echo '<center><div id="reg_notifice" style="color: green ;">успешно</div><hr></center>';
	}
	else {
		echo '<center><div id="reg_notifice" style="color: red;">'.array_shift($errors).'</div></center>';
	}
}
?>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	<script>
		var granimInstance = new Granim({
			element: '#canvas-basic',
			direction: 'left-right',
			isPausedWhenNotInView: true,
			states : {
				"default-state": {
					gradients: [
					['#ff9966', '#ff5e62'],
					['#00F260', '#0575E6'],
					['#e1eec3', '#f05053']
					]
				}
			}
		});
	</script>
</body>
</html>