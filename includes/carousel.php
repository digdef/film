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
							<?
							for ($i = 0; $i < 3; $i++) {
								echo '
								<div class="card text-center">
									<a href="'.$carousel[$i]['link'].'">
										<img src="img/slider/' . $carousel[$i]['img'] . '" class="card-img-top">
									</a>
								</div>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item ">
				<div class="container-fluid ">
					<div class="container p-5">
						<div class="card-deck">
							<?
							for ($i = 3; $i < 6; $i++) {
								echo '
								<div class="card text-center">
									<a href="'.$carousel[$i]['link'].'">
										<img src="img/slider/' . $carousel[$i]['img'] . '" class="card-img-top">
									</a>
								</div>';
							}
							?>
						</div>
					</div>
				</div>
			</div>
			<div class="carousel-item ">
				<div class="container-fluid ">
					<div class="container p-5">
						<div class="card-deck">
							<?
							for ($i = 6; $i < 9; $i++) {
								echo '
								<div class="card text-center">
									<a href="'.$carousel[$i]['link'].'">
										<img src="img/slider/' . $carousel[$i]['img'] . '" class="card-img-top">
									</a>
								</div>';
							}
							?>
								
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
			<li data-target="#carouselExampleIndicators1" data-slide-to="3"></li>
			<li data-target="#carouselExampleIndicators1" data-slide-to="4"></li>
			<li data-target="#carouselExampleIndicators1" data-slide-to="5"></li>

		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<div class="container-fluid ">
					<div class="container p-5">
						<div class="card-deck">
							<?
                            for ($i = 0; $i < 1; $i++) {
                                echo '
								<div class="card text-center">
									<a href="'.$carousel[$i]['link'].'">
										<img src="img/slider/' . $carousel[$i]['img'] . '" class="card-img-top">
									</a>
								</div>';
							}
                            ?>
						</div>
					</div>
				</div>
			</div>

			<div class="carousel-item">
				<div class="container-fluid ">
					<div class="container p-5">
						<div class="card-deck">
							<?
                            for ($i = 1; $i < 2;$i++) {
                                echo '
								<div class="card text-center">
									<a href="'.$carousel[$i]['link'].'">
										<img src="img/slider/' . $carousel[$i]['img'] . '" class="card-img-top">
									</a>
								</div>';
                            }
                            ?>
						</div>
					</div>
				</div>
			</div>

			<div class="carousel-item">
				<div class="container-fluid ">
					<div class="container p-5">
						<div class="card-deck">
							<?
                            for ($i = 2; $i < 3; $i++) {
                                echo '
								<div class="card text-center">
									<a href="'.$carousel[$i]['link'].'">
										<img src="img/slider/' . $carousel[$i]['img'] . '" class="card-img-top">
									</a>
								</div>';
                            }
                            ?>
						</div>
					</div>
				</div>
			</div>

			<div class="carousel-item">
				<div class="container-fluid ">
					<div class="container p-5">
						<div class="card-deck">
							<?
                            for ($i = 3; $i < 4; $i++) {
                                echo '
								<div class="card text-center">
									<a href="'.$carousel[$i]['link'].'">
										<img src="img/slider/' . $carousel[$i]['img'] . '" class="card-img-top">
									</a>
								</div>';
                            }
                            ?>
						</div>
					</div>
				</div>
			</div>

			<div class="carousel-item">
				<div class="container-fluid ">
					<div class="container p-5">
						<div class="card-deck">
							<?
                            for ($i = 4; $i < 5; $i++) {
                                echo '
								<div class="card text-center">
									<a href="'.$carousel[$i]['link'].'">
										<img src="img/slider/' . $carousel[$i]['img'] . '" class="card-img-top">
									</a>
								</div>';
                            }
                            ?>
						</div>
					</div>
				</div>
			</div>

			<div class="carousel-item">
				<div class="container-fluid ">
					<div class="container p-5">
						<div class="card-deck">
							<?
                            for ($i = 5; $i < 6; $i++) {
                                echo '
								<div class="card text-center">
									<a href="'.$carousel[$i]['link'].'">
										<img src="img/slider/' . $carousel[$i]['img'] . '" class="card-img-top">
									</a>
								</div>';
                            }
                            ?>
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