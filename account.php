<?php
require"config.php";
session_start();
if (empty($_SESSION['auth']) or $_SESSION['auth'] == false) {
	header("location: ../login.php");
} else {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/main.css"></link>
	<title>Look Later</title>
	<script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
</head>
<body>
	<?
	require"includes/header.php";

	$name=$_SESSION['login'];
	$id=$_SESSION['id'];
	$res=mysqli_query($connection,"SELECT * FROM `users` WHERE `login`='$name' ");
	$user_data=mysqli_fetch_array($res);
	$data=$_POST;

	$subscriptions=mysqli_query($connection,"SELECT * FROM `subs` WHERE `subscriber`='$name' ");

	if (isset($_POST['do_avatar1'])) {
		mysqli_query($connection, "UPDATE `users` SET `avatar` = 'avatar1.png' WHERE `users`.`id` ='$id' ");	
	}
	if (isset($_POST['do_avatar2'])) {
		mysqli_query($connection, "UPDATE `users` SET `avatar` = 'avatar2.png' WHERE `users`.`id` ='$id' ");	
	}
	if (isset($_POST['do_avatar3'])) {
		mysqli_query($connection, "UPDATE `users` SET `avatar` = 'avatar3.png' WHERE `users`.`id` ='$id' ");	
	}
	?>

	<div style="padding-top: 1%"></div>
	<div id="main">
		<article style="display: inline-block;">
			<div class="avatar">
				<img style="min-width: 210" id="index_img"  src="img/avatar/<? echo $user_data['avatar'];?>"></p>
				<button class="btn btn-primary" name="name" data-toggle="modal" data-target="#exampleModal">
					Изменить Аватрар
				</button>
				<a class="btn btn-primary" href='includes\exit.php'>
					<i class="fas fa-sign-out-alt"></i>
				</a></p>
				<input class="btn btn-primary" type="submit" name="do_signup" value="Подписки" data-toggle="modal" data-target="#exampleModal2">
			</div>		    		
			<div class="text">
				<span id="name">
					<?
					echo $user_data['name']."<br>";
					echo "Почта: ". $user_data['email']."<br>";
					?>
				</span></p>

				<div>
					<form class="box-settings" action="account.php" method="POST">
						<h2>Настройки</h2>
						<input type="text" name="name" placeholder="Изменить Имя" value="<? echo @$data['name'] ?>">
						<input id="btn" type="submit" name="update_name" value="Изменить">

						<input type="email" name="email" placeholder="Изменить Email" value="<? echo @$data['email'] ?>">
						<input id="btn" type="submit" name="update_email" value="Изменить">

						<input minlength="7" type="password" name="password" placeholder="Изменить Пароль" value="<? echo @$data['password'] ?>">
						<input minlength="7" type="password" name="password_2" placeholder="Подтвердите Пароль" value="<? echo @$data['password_2'] ?>"><br>
						<input id="btn"  type="submit" name="update_password" value="Изменить">
						<?
						if (isset($_POST['update_name'])) {
							$errors = array();
							if ($data['name'] == '') {
								$errors[] = 'Введите Имя!';
							}
							if (empty($errors)) {
								mysqli_query($connection, "UPDATE `users` SET `name` = '".$_POST['name']."' WHERE `users`.`id` ='$id' ");
								echo '<center><div id="reg_notifice" style="color: green ;">Успешно</div><hr></center>';
							} else {
								echo '<center><span style="color: red;font-weight: bold; padding-bottom:30px;">'.$errors['0'].'</span></center>';
							}
						}
						if (isset($_POST['update_email'])) {
							$errors = array();
							if ($data['email'] == '') {
								$errors[] = 'Введите Email!';
							}
							if (empty($errors)) {
								mysqli_query($connection, "UPDATE `users` SET `email` = '".$_POST['email']."' WHERE `users`.`id` ='$id' ");
								echo '<center><div id="reg_notifice" style="color: green ;">Успешно</div><hr></center>';
							} else {
								echo '<center><span style="color: red;font-weight: bold; padding-bottom:30px;">'.$errors['0'].'</span></center>';
							}
						}
						if (isset($_POST['update_password'])) {
							$errors = array();
							if ($data['password'] == '') {
								$errors[] = 'Введите Пароль!';
							}
							if ($data['password_2'] != $data['password']) {
								$errors[] = 'Подтвердите Пароль!';
							}
							if (empty($errors)) {
								mysqli_query($connection, "UPDATE `users` SET `password` = '".password_hash($data['password'], PASSWORD_DEFAULT)."' WHERE `users`.`id` ='$id' ");
								echo '<center><div id="reg_notifice" style="color: green ;">Успешно</div><hr></center>';
							} else {
								echo '<center><span style="color: red;font-weight: bold; padding-bottom:30px;">'.$errors['0'].'</span></center>';
							}
						}
						?>
					</form>	
				</div>
			</div>
		</article>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<form id="brm" class="box" action="account.php" method="POST">
					<h1>Изменить Аватар</h1>
					<p>
						<button class="btn btn-link" type="submit" name="do_avatar1">
							<img style="max-width: 200px" src="img/avatar/avatar1.png">
						</button>
						<button class="btn btn-link" type="submit" name="do_avatar2">
							<img style="max-width: 200px" src="img/avatar/avatar2.png">
						</button>
						<button class="btn btn-link" type="submit" name="do_avatar3">
							<img style="max-width: 200px" src="img/avatar/avatar3.png">
						</button>
					</p>
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<form id="brm" class="box" action="account.php" method="POST">
					<h1>Подписки</h1>
					<?
					while ($sub=mysqli_fetch_array($subscriptions)){ 
						$sub1=$sub['subscription'];			
						$film = mysqli_query($connection, "SELECT * FROM `film` WHERE `title`='$sub1' ORDER BY `id`");
						$mov = mysqli_fetch_assoc($film);
						?>
						<a id="link1" href="film.php?id=<?php echo $mov['id'];?>"><? echo $sub['subscription']?></a><br>
					<? } ?>
				</form>
			</div>
		</div>
	</div>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html><?
}
?>