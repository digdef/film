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
	?>
<a id="genre-btn" href="#" onclick="toggle('#vipad');">Жанр</a>

<div id="vipad">
	<?
	$categories =mysqli_query($connection, "SELECT * FROM `categories`");
	?>
	<div id="genre-bar" >
		<p>
		<?	while ($cat = mysqli_fetch_assoc($categories)){ ?>
			<button onclick="location='/categories.php?id=<? echo $cat['id'];?>'" id="genre"><? echo $cat['categories']; ?></button>
		<? }; ?>
		</p>
	</div>
</div> 

	<div style="padding-top: 20px">
		<div class="container-fluid" id="content">
			<div class="row text-center ">
				<?
				if (isset($_POST['submit'])) {
					$reply = '';
					$search = $_POST['search'];
					$search = trim($search);
					$search = strip_tags($search);
					$search = mysqli_real_escape_string($connection, $search);


					if(!empty($search)){
						$result = mysqli_query($connection, "SELECT * FROM film WHERE title LIKE '%$search%' ");
						$num = mysqli_num_rows($result);
						if($num > 0){
							$row = mysqli_fetch_assoc($result);  
							do{
								$reply .='<div class="col-xs-2 col-sm-4 col-lg-3 col-xl-2 tile-img">';
								$reply .='<a href="film.php?id='. $row['id'].'" id="link">';
								$reply .='<img src="img/'.$row['img'].'" class="w-100">';
								$reply .='<h3>'. $row['title'].'</h3>';
								$reply .='</a>';
								$reply .='</div>';							
							}
							while($row = mysqli_fetch_assoc($result));
						} else{
							$reply = '<h1>По вашему запросу ничего не найдено.</h1>';
						}
					}
					else{
						$reply = '<h1>Задан пустой поисковый запрос.</h1>';
					}
					echo $reply;
				}
				?>
			</div>
		</div>
	</div>
	<?
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
					<a href="film.php?id=<? echo $mov['id'];?>" id="link">
						<img src="img/<? echo $mov['img'];?>" class="w-100">
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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script type="text/javascript">
$(function() {
	$("div[id*='vipad']").hide();    
})();


function toggle(objName) {
	var obj = $(objName),
	blocks = $("div[id*='vipad']");

	if (obj.css("display") != "none") {
		obj.animate({ height: 'hide' }, 500);
	} else {
		var visibleBlocks = $("div[id*='vipad']:visible");

		if (visibleBlocks.length < 1) {
			obj.animate({ height: 'show' }, 500);
		} else {
			$(visibleBlocks).animate({ height: 'hide' }, 500, function() {
				obj.animate({ height: 'show' }, 500);
			});
		}
	}
}
</script>
</body>
</html>