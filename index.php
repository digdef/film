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
	<?php
	require"includes/header.php";
	?>
	<div id="carousel" style="background-color: #24344f" class="container-fluid">
		<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="container-fluid ">
						<div class="container p-5">
							<div class="card-deck">
								<div class="card text-center" style="width: 20rem">
									<img src="img/1.jpg" class="card-img-top">
									<div class="card-body">
										<h3 class="card-title"><a id="link" href="#">1</a></h3>
									</div>
								</div>
								<div class="card text-center" style="width: 20rem">
									<img src="img/1.jpg" class="card-img-top">
									<div class="card-body">
										<h3 class="card-title"><a id="link" href="#">2</a></h3>
									</div>
								</div>
								<div class="card text-center" style="width: 20rem">
									<img src="img/1.jpg" class="card-img-top">
									<div class="card-body">
										<h3 class="card-title"><a id="link" href="#">3</a></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="carousel-item ">
					<div class="container-fluid ">
						<div class="container p-5">
							<div class="card-deck">
								<div class="card text-center" style="width: 20rem">
									<img src="img/1.jpg" class="card-img-top">
									<div class="card-body">
										<h3 class="card-title"><a id="link" href="#">4</a></h3>
									</div>
								</div>
								<div class="card text-center" style="width: 20rem">
									<img src="img/1.jpg" class="card-img-top">
									<div class="card-body">
										<h3 class="card-title"><a id="link" href="#">5</a></h3>
									</div>
								</div>
								<div class="card text-center" style="width: 20rem">
									<img src="img/1.jpg" class="card-img-top">
									<div class="card-body">
										<h3 class="card-title"><a id="link" href="#">6</a></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="carousel-item ">
					<div class="container-fluid ">
						<div class="container p-5">
							<div class="card-deck">
								<div class="card text-center" style="width: 20rem">
									<img src="img/1.jpg" class="card-img-top">
									<div class="card-body">
										<h3 class="card-title"><a id="link" href="#">7</a></h3>
									</div>
								</div>
								<div class="card text-center" style="width: 20rem">
									<img src="img/1.jpg" class="card-img-top">
									<div class="card-body">
										<h3 class="card-title"><a id="link" href="#">8</a></h3>
									</div>
								</div>
								<div class="card text-center" style="width: 20rem">
									<img src="img/1.jpg" class="card-img-top">
									<div class="card-body">
										<h3 class="card-title"><a id="link" href="#">9</a></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a href="#carouselExampleIndicators" class="carousel-control-prev" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a href="#carouselExampleIndicators" class="carousel-control-next" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">next</span>
			</a>
		</div>
	</div>

	<div id="carousel2" style="background-color: #24344f" class="container-fluid">
		<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li class="active" data-target="#carouselExampleIndicators1" data-slide-to="0"></li>
				<li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
				<li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<div class="container-fluid ">
						<div class="container p-5">
							<div class="card-deck">
								<div class="card text-center">
									<img src="img/1.jpg" class="card-img-top">
									<div class="card-body">
										<h3 class="card-title"><a id="link" href="#">1</a></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="carousel-item">
					<div class="container-fluid ">
						<div class="container p-5">
							<div class="card-deck">
								<div class="card text-center">
									<img src="img/1.jpg" class="card-img-top">
									<div class="card-body">
										<h3 class="card-title"><a id="link" href="#">2</a></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="carousel-item">
					<div class="container-fluid ">
						<div class="container p-5">
							<div class="card-deck">
								<div class="card text-center">
									<img src="img/1.jpg" class="card-img-top">
									<div class="card-body">
										<h3 class="card-title"><a id="link" href="#">3</a></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<a href="#carouselExampleIndicators1" class="carousel-control-prev" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a href="#carouselExampleIndicators1" class="carousel-control-next" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">next</span>
			</a>
		</div>
	</div>
		<?php
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

			$film = mysqli_query($connection, "SELECT * FROM `film` ORDER BY `id` DESC LIMIT $start, $num");

		
			?>
	<div style="padding-top: 20px">
		<div class="container-fluid" id="content">
			<div class="row text-center ">
			<?php 
				while ($art = mysqli_fetch_assoc($film)){ ?>
				<div class="col-xs-2 col-sm-4 col-lg-3 col-xl-2">
					<img src="img/<?php echo $art['img'];?>" class="w-100">
					<h3><a href="film.php?id=<?php echo $art['id'];?>" id="link"><?php echo $art['title']; ?></a></h3>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
	<div style="text-align: center;"> <?php
				if ($page != 1) $pervpage = '<a style="font-size: 25px;color: #515966;" href= ./index.php?page=1><<</a>  
				                               <a style="font-size: 25px;color: #515966;" href= ./index.php?page='. ($page - 1) .'>&#9668;</a> ';
				if ($page != $total) $nextpage = ' <a style="font-size: 25px;color: #515966;" href= ./index.php?page='. ($page + 1) .'>&#9658;</a>  
				                                   <a style="font-size: 25px;color: #515966;" href= ./index.php?page=' .$total. '>>></a>';  
				if($page - 2 > 0) $page2left = ' <a style="font-size: 25px;color: #515966;" href= ./index.php?page='. ($page - 2) .'>'. ($page - 2) .'</a>  ';  
				if($page - 1 > 0) $page1left = '<a style="font-size: 25px;color: #515966;" href= ./index.php?page='. ($page - 1) .'>'. ($page - 1) .'</a>  ';  
				if($page + 2 <= $total) $page2right = '  <a style="font-size: 25px;color: #515966;" href= ./index.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';  
				if($page + 1 <= $total) $page1right = '  <a style="font-size: 25px;color: #515966;" href= ./index.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>';
				?> 
	</div>
	<center>
				<?php
				echo $pervpage.$page2left.$page1left.'<b style="font-size: 26px;color: #515966;">'.$page.'</b>'.$page1right.$page2right.$nextpage;
			?>
	</center>
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