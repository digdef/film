<?php
require"config.php";
session_start();?>
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
	<?php
	require"includes/header.php";

	$name=$_SESSION['login'];
	$res=mysqli_query($connection,"SELECT * FROM `users` WHERE `login`='$name' ");
	$user_data=mysqli_fetch_array($res);

	?>
	<div style="padding-top: 1%"></div>
	<div id="main">
		<article style="display: inline-block;">
			<div class="avatar">
				<img style="min-width: 210" id="index_img"  src="img/avatar/<?php echo $user_data['avatar'];?>"></p>
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
					<?php
					echo $user_data['name']."<br>";
					echo "Почта: ". $user_data['email']."<br>";
					?>
				</span></p>
				<div >
                    <form class="box-settings" action="account.php" method="POST">
						<h2>Настройки</h2>
						<input type="text" name="name" placeholder="Изменить Имя" value="<?php echo @$data['name'] ?>"> 
						<input type="password" name="password" placeholder="Изменить Пароль" value="<?php echo @$data['password'] ?>"> 
						<input type="email" name="email" placeholder="Изменить Email" value="<?php echo @$data['email'] ?>">
						<input type="password" name="password_2" placeholder="Подтвердите Пароль" value="<?php echo @$data['password_2'] ?>"><br>
						<input class="btn btn-primary" type="submit" name="do_signup" value="Изменить">
					</form>	
				</div>	
			</div>
		</article>
	</div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<form action="account.php" method="POST">
					<h1>Изменить Аватар</h1>
					<p>
						<input style="max-width: 200px"  type="image" name="" src="img/avatar/avatar1.png">
						<input style="max-width: 200px"  type="image" name="" src="img/avatar/avatar2.png">
						<input style="max-width: 200px"  type="image" name="" src="img/avatar/avatar3.png">
					</p>
					<input type="submit" name="do_signup" value="Изменить">
				</form>
			</div>
		</div>
	</div>
	<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<form  class="box" action="account.php" method="POST">
					<h1>Подписки</h1>
					<a href="">Срань</a>
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>