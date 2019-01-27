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
	<nav class="navbar navbar-expand-lg navbar-dark">
		<a href="/" id="logo" >
			<span>
				Look Later
			</span>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div style="margin-left: 5%" class="collapse navbar-collapse " id="navbarSupportedContent">
			<ul class="navbar-nav " id="about">
				<li class="nav-item ">
					<a href="index.php" class="nav-link">Главная</a>
				</li>
				<li class="nav-item">
					<a href="includes/account.php" class="nav-link">Аккаунт</a>
				</li>
				<li class="nav-item">
					<a href="index.php" class="nav-link">Поиск</a>
				</li>
			</ul>
			<div class=" mx-auto"></div>
			<div class="search-box ">
				<input class="search-txt" type="text" name="" placeholder="Type ro search">
				<a class="search-btn" href="#">
					<i class="fas fa-search"></i>
				</a>
			</div>
		</div>
	</nav>
	<?php
	$film = mysqli_query($connection, "SELECT * FROM `film` WHERE `id` = ".(int) $_GET['id']);
	if (mysqli_num_rows($film) <= 0) {
	?>	
	<div>
		<div>
			<h2>Не Найдено!</h2>
			<img style="max-width: 60%; max-height: 60%;" src="img/not.png">
		</div>
	</div>
	<?php
	}
	else{
		$art = mysqli_fetch_assoc($film);
	?>
	<center>
		<h2 class="p-5"><?php echo $art['title']; ?></h2>
	</center>
	<div class="container p-5">
		<div class="embed-responsive embed-responsive-16by9">
			<iframe src="<?php echo $art['trailer']; ?>" class="embed-responsive-item" allowfullscreen></iframe>
		</div>
	</div>
	<div id="main">
	<article style="display: inline-block;">
		<div class="intro">
			<img  id="index_img"  src="img/<?php echo $art['img'];?>" ></p>
			<div>
				<button style="margin: 0px;" id="c">Посмотреть</button>
			</div>
		</div>		    		
		<div class="text">
			<span>
				<?php echo $art['text']; ?> 
			</span>
		</div>
		<div class="text">
			<span>
				Дата выхода: 
				<?php echo $art['date']; ?> 
			</span>
		</div>
	</article>

	<?php
	}
	?>
	</div>
	<footer id="faq">
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