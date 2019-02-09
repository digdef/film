<?php
require"config.php";

function generateSalt() {
	$salt = '';
	$saltLength = 8;
	for($i=0; $i<$saltLength; $i++) {
		$salt .= chr(mt_rand(33,126));
	}
	return $salt;
}
$mail = $_POST['email'];
$user = mysqli_query($connection,"SELECT * FROM `users` WHERE `email`='".$mail."'");
if (isset($_POST['recovery'])) {
	$errors = array();
	if (trim($_POST['email']) == '') {
		$errors[] = 'Введите Email!';
	}
	if (mysqli_num_rows($user) == 0) {
		$errors[] = 'Такого Email нет';
	}
	if (empty($errors)) {	
		mail("bydigdef@gmail.com", "Запрос на восстановление пароля", "Hello. ссылка на восстановление http://film/password_recovery/recovery.php");
		session_start();
		$_SESSION['email'] = $mail;
	} else {
		echo '<center><span style="color: red;font-weight: bold; padding-bottom:30px;">'.$errors['0'].'</span></center>';
	}
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
		<form action="verification.php" method="POST"> 
			<h1>Забыл пароль!</h1>
			<input required="" type="Email" name="email" placeholder="Email">
			<input type="submit" name="recovery" value="Отправить">
		</form>
	</div>

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