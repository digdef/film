<?php
require"config.php";
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
	<div style="padding-top: 2%" id="main">
	<article style="display: inline-block;">
		<div class="intro">
			<img  id="index_img"  src="img/<? echo $art['img'];?>" ></p>
			<div>
				<button style="margin: 0px;" id="btn">Подписаться</button>
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
				<? echo $art['genre']; ?> 
			</span>
		</div>
	</article>

	<?
	}
	?>
	</div>
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