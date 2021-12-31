<?php 
	require "db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<nav class="navbar">
		<div class="container-menu">
			<a href="#" class="navbar-brand"><img src="logo.png" alt=""></a>
			
			<div class="navbar-wrap">
			<?php 

				if(isset($_SESSION['user']))
				{
					echo($_SESSION['user']['username'] . '&nbsp;');
					echo("<a href='exit.php'><ion-icon style='font-size: 20px;' name='log-out-outline'></ion-icon></a>");
				}
				else
				{
			?>
				<ul class="navbar-menu">
					<li><a href="login.php">Login</a></li>
					<li><a href="signup.php">Register</a></li>
				</ul>
			</div>
		</div>
				Signin to be able to add news! aa
			<?php } ?>
	</nav>
	
</body>
</html>

