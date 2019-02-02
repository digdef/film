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
	$result = mysqli_query($connection, "SELECT * FROM slider LIMIT 9");
	$carousel = array();

	while ($r = $result->fetch_assoc()) {
		$carousel[] = $r;
	}
	require"includes/carousel.php";
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
			<? 
				while ($mov = mysqli_fetch_assoc($film)){ ?>
				<div class="col-xs-2 col-sm-4 col-lg-3 col-xl-2 tile-img">
					<a href="film.php?id=<?php echo $mov['id'];?>" id="link">
						<img src="img/<?php echo $mov['img'];?>" class="w-100">
						<h3><? echo $mov['title']; ?></h3>
					</a>
				</div>
			<? } ?>
			</div>
		</div>
	</div>
	<div style="text-align: center;"> <?
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
				<?
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
	<script>
	$('.card.text-center').css('border', 'none');
	$('.carousel').carousel({
		interval: 1000 * 30
	});    
	</script>

</body>
</html>