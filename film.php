<?php
require"config.php";
session_start();
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

	$film = mysqli_query($connection, "SELECT * FROM `film` WHERE `id` = ".(int) $_GET['id']);
	if (mysqli_num_rows($film) <= 0) {
	?>	
	<div>
		<div>
			<h2>Не Найдено!</h2>
			<img style="max-width: 60%; max-height: 60%;" src="img/not.png">
		</div>
	</div>
	<?
	} else {
		$art = mysqli_fetch_assoc($film);
	?>
	<center>
		<h2 class="p-5"><? echo $art['title']; ?></h2>
	</center>
	<div class="container p-1">
		<div class="embed-responsive embed-responsive-16by9">
			<iframe src="<? echo $art['trailer']; ?>" class="embed-responsive-item" allowfullscreen></iframe>
		</div>
	</div>
	<?
	$film_title = $art['title'];
	$genre = mysqli_query($connection,"SELECT * FROM `genre` WHERE `film`='$film_title' ");
	?>
	<div style="padding-top: 2%" id="main">
		<article style="display: inline-block;">
			<div class="intro">
				<img  id="index_img"  src="img/<? echo $art['img'];?>" ></p>
				<div>
					<form action="film.php?id=<? echo $art['id'];?>" method="POST">
						<button type="submit" name="subscriptions" style="margin: 0px;" id="btn">Подписаться</button>
					</form>
				</div>
			</div>
			<div class="text">
				<span>
					<? echo $art['text']; ?> 
				</span>
			</div>
			<div class="text">
				<span>
					Дата выхода: 
					<? echo $art['date']; ?><br>
					Жанр:
					<?
					while ($gnr = mysqli_fetch_array($genre)) {
						$gnr1 = $gnr['categories'];

						$categories = mysqli_query($connection, "SELECT * FROM `categories` WHERE `categories`='$gnr1' ");
						$cat = mysqli_fetch_assoc($categories);
						?>
						<a href="categories.php?id=<? echo $cat['id'];?>" id="link">
							<? echo $cat['categories'];?>
						</a>
						<?
					}
					?> 
				</span>
			</div>
		</article>
	</div>
	<div class="container">

		<div class="box-comment">
			<form action="film.php?id=<? echo $art['id'];?>" method="POST">
				<input type="text" name="text" placeholder="Комментарий">
				<button type="submit" name="add_comment"><i class="far fa-paper-plane"></i></button>
				<?
				$name = $_SESSION['login'];
				$res = mysqli_query($connection,"SELECT * FROM `users` WHERE `login`='$name' ");
				$user_data = mysqli_fetch_array($res);

				$genre1 = mysqli_query($connection,"SELECT * FROM `subs` WHERE `subscription`='$film_title' AND `subscriber`='$name'");

				if (isset($_POST['subscriptions'])) {
					if (mysqli_num_rows($genre1) > 0) {
						$errors[] = 'Вы уже подписаны!';
					}
					if (empty($errors)) {
						mysqli_query($connection, "INSERT INTO `subs` (`subscriber`, `subscription`) VALUES ('".$name."','".$film_title."')");
					}
					else {
						echo '<center><div id="reg_notifice" style="color: red;">'.array_shift($errors).'</div></center>';
					}
				}

				if (isset($_POST['add_comment'])) {
					$errors = array();
					if ($_POST['text'] == '') {
						$errors[] = 'Добавьте Комментарий';
					}
					if ($user_data['name'] == '') {
						$errors[] = 'Войдите';
					}
					if (empty($errors)) {
						$text = $_POST['text'];
						$text = strip_tags($text);
						$text = mysqli_real_escape_string($connection, $text);		

						mysqli_query($connection, "INSERT INTO `comment` (`text`,`nick`,`avatar`,`film_id`) VALUES ('".$text."', '".$user_data['name']."', '".$user_data['avatar']."', '".$art['id']."') ");
						echo '<div id="reg_notifice" style="color: green; ">Успешно</div>';
					} else {
						echo '<center><span style="color: red;font-weight: bold; padding-bottom:30px;">'.$errors['0'].'</span></center>';
					}
				}
				?>				
			</form>
		</div>

		<div class="container" style="display: inline-block;">
			<?
			$comments = mysqli_query($connection, "SELECT * FROM `comment` WHERE `film_id` = '". (int) $art['id']."' ORDER BY `id` DESC");
			if (mysqli_num_rows($comments) <= 0) {
				?>
				<div id="comment">				
					<div style="text-align: center; width: 100%" id="comment1">
						<h3>Нет Комментариев!</h3>
					</div>
				</div>
				<?
			} 
			while ($comment = mysqli_fetch_assoc($comments)) { 
			?>
				<div id="comment">
					<div>
						<div style="text-align: center;">
							<span><? echo $comment['nick']; ?></span>
						</div>
						<img id="avatar_img" src="img/avatar/<? echo $comment['avatar'];?>"></p>
					</div>					
					<div id="comment1">
						<span><? echo $comment['text']; ?> </span>
					</div>
				</div>
			<?	
			}
			?>
		</div>
	</div>
	<?
	}
	?>	
	<footer id="faq-main">
		<div>
			<span class="title"><a id="link" href="includes/about.html">About</a></span><br>
		</div>
		<div>
			<span class="title"><a id="link" href="includes/Holders.html">Holders</a></span><br>
		</div>
	</footer>			

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>