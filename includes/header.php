<nav class="navbar navbar-expand-lg navbar-dark sticky-top">
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
				<a href="account.php" class="nav-link">Аккаунт</a>
			</li>
			<li class="nav-item">
				<a href="search.php" class="nav-link">Поиск</a>
			</li>
		</ul>
		<div class=" mx-auto"></div>
		<form class="search-box " name="search" method="post" action="search.php">
			<input class="search-txt" type="search" name="query" placeholder="Type ro search">
			<button type="submit" class="search-btn btn btn-link">
				<i class="fas fa-search"></i>
			</button> 
			
		</form>
	</div>
</nav>