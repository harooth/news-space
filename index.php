<?php 
	require "auth/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" title="theme" href="theme-light.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<nav class="navbar">
			<div>
				<div class="nav-left">
					<a href=""><img src="news.png" alt="logo" class="navbar-logo"></a>
					<form action="#" method="get">
						<div class="search-input">
							<svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 16.505 16.494" class="search-icon"><path d="M426.811,312.25a6.71,6.71,0,1,1,1.172-1.169l.011-.014,4.49,4.472-1.192,1.192-4.474-4.481Zm-4.112-.268a5.035,5.035,0,0,0,0-10.071h0a5.035,5.035,0,0,0,0,10.071Z" transform="translate(-415.978 -300.236)" fill="#808080"></path></svg>
							<input placeholder="Search for anything..." type="search" role="search" name="q" aria-label="Search" value="" class="global-search">
						</div>
					</form>
				</div>

				<div class="nav-right">
					<div class="checkbox">
						<div class="wrapper">
							<input type="checkbox" >
						</div>
					</div>
					<div class="vertical-line"></div>
					<a href="news/addNews.php"><button class="upload-button">UPLOAD</button></a>
					<div class="vertical-line"></div>
					<?php 

						if(isset($_SESSION['user']))
						{
							echo("<div class='logged_user'>");
							echo($_SESSION['user']['username'] . '&nbsp;');
							// echo("<a href='exit.php'><ion-icon style='font-size: 20px;' name='log-out-outline'></ion-icon></a>");
							echo("<a href='auth/exit.php'>Exit</a>");
							echo('</div>');
						}
						else
						{
					?>
					<div class="user">
						<img src="nouser.svg">
					</div>

					<a href="auth/login.php"><button class="join">JOIN FREE</button></a>
					<?php } ?>
				</div>
			</div>
		</nav>
	</header>



	<div class="main">
		<div class="menu">
			<nav>
				<ul class="nav-links">
					<li><a href="">Home</a></li>
					<li><a href="">About</a></li>
					<li><a href="">Contact us</a></li>
					<li><a href="">Feedback</a></li>
					<li><a href="">Reviews</a></li>
				</ul>
			</nav>
		</div>


		<div class="banner">
			 <div class="galaxy"></div>

			 <h1>#1 Galaxy news</h1>
			 <h2>Hot news from each corner of space</h2>
		</div>

		<div class="pstik-text">
			<h3>Now let's see what's going on around us! Here are news from your planet!</h3>
		</div>

		<div class="container">
			<?php 
				$data = R::findAll('news');
				foreach($data as $news) {
			 ?>
			<div class="news">
				 <a href=""><h3 class="news-title"><?php echo $news->title; ?></h3></a>
				 <div class="news-div">
					 <img src="news/images/featured.jpg" alt="Featured image" class="featured-image">

					 <div class="news-container">
					 	
					 	<p class="news-content"><?php echo $news->excerpt."...  "; ?><a href="">Read more></a></p>
					 	<p class="news-info">Added by <a href=""><?php echo $news->user; ?>,</a> <?php echo $news->date; ?></p>
					 </div>
				 </div>
				 

			</div>
			<?php } //foreach ?>
		</div>


	</div>
	

	<script src="script.js"></script>
</body>
</html>