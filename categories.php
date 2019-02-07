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

	$categor = mysqli_query($connection, "SELECT * FROM `categories` WHERE `id` = ".(int) $_GET['id']);
	if (mysqli_num_rows($categor) <= 0) {
		?>	
		<div>
			<div>
				<h2>Не Найдено!</h2>
				<img style="max-width: 60%; max-height: 60%;" src="img/not.png">
			</div>
		</div>
		<?
	} else {
		$res=mysqli_query($connection,"SELECT * FROM `categories` ");
		$user_data=mysqli_fetch_array($categor);
		$categories=$user_data['categories'];
		echo '<center><h2>'.$categories.'</h2></center>' ;

		$subscriptions=mysqli_query($connection,"SELECT * FROM `genre` WHERE `categories`='$categories' ");
		?>
		<div style="padding-top: 20px">
			<div class="container-fluid" id="content">
				<div class="row text-center ">
					<? 
					while ($sub=mysqli_fetch_array($subscriptions)) { 
						$sub1=$sub['film'];
						$num = 18; 
						$page = 1;

						if ( isset($_GET['page']) ) {
							$page = (int) $_GET['page'];
						} 

						$result = mysqli_query($connection,"SELECT COUNT(`id`) AS `posts` FROM `film`"); 
						$posts = mysqli_fetch_assoc($result);
						$posts = $posts['posts'];  
						$total = intval(($posts - 1) / $num) + 1;
						$page = intval($page);  
						if(empty($page) or $page < 0) $page = 1;
						if($page > $total) $page = $total;  

						$start = $page * $num - $num;	

						$film = mysqli_query($connection, "SELECT * FROM `film` WHERE `title`='$sub1' ORDER BY `id` DESC LIMIT $start, $num");
						$mov = mysqli_fetch_assoc($film);
						?>
						<div class="col-xs-2 col-sm-4 col-lg-3 col-xl-2 tile-img">
							<a href="film.php?id=<? echo $mov['id'];?>" id="link">
								<img src="img/<? echo $mov['img'];?>" class="w-100">
								<h3><? echo $mov['title']; ?></h3>
							</a>
						</div>
					<? } ?>
				</div>
			</div>
		</div>
	<? } ?>




	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>	
</body>
</html>