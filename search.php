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
	<?
	$categories =mysqli_query($connection, "SELECT * FROM `categories`");
	?>
	<div class="container">
		<p>
		<?	while ($cat = mysqli_fetch_assoc($categories)){ ?>
			<button onclick="location='/'" id="genre"><? echo $cat['categories']; ?></button>
		<? }; ?>
		</p>		
	</div>
	
	<div style="padding-top: 20px">
		<div class="container-fluid" id="content">
			<div class="row text-center ">
			<?
			if (isset($_POST['submit'])) {

				$search = $_POST['search'];
				$search = trim($search);
				$search = strip_tags($search);
				$search = mysqli_real_escape_string($connection, $search);
				$search = explode(" ", $search);

				$count = count($search);
				$array = array();
				$i = 0;

				foreach ($search as $key) {
					$i++;
					if ($i < $count)  {
						$array[] = "CONCAT (`title_search`) LIKE '%$key%' OR";
					} else {
						$array[] = "CONCAT (`title_search`) LIKE '%$key%'";
					}
				}

				$sql = "SELECT * FROM `film` WHERE ".implode(" ", $array);
				$query = mysqli_query($connection, $sql);
				if ($count == [0]) {
					echo "Ничего не найдено";
				} else{
					while ($row = mysqli_fetch_assoc($query)){ ?>
						<div class="col-xs-2 col-sm-4 col-lg-3 col-xl-2">
							<a href="film.php?id=<? echo $row['id'];?>" id="link">
								<img src="img/<? echo $row['img'];?>" class="w-100">
								<h3><? echo $row['title']; ?></h3>
							</a>
						</div>
					<?				
					}
				}
			}
			?>
			</div>
		</div>
	</div>
</body>
</html>