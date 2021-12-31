<?php 
	require "db.php";
		if(isset($_SESSION['user'])){
			header("Location: ../index.php");
		}
		else{
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Register</title>
	<!-- <link rel="stylesheet" href="css/style.css"> -->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<link rel="stylesheet" href="css/styleo.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

	<style>
		input
		{
			height: 40px;
		}

		.link
		{
			margin-top: 0px;
		}

		.g-recaptcha
		{
			margin-bottom: 10px;
		}
	</style>
</head>
<body>
	<div class="main">
		<div class="container">
			<form action="action.php" method="post" enctype="multipart/form-data">
				<span class="title">Sign Up</span>

				<span class="description">Username</span>
				<input type="text" name="username" value="<?= @$_SESSION['old']['username']; ?>">

				<span class="description">Email</span>
				<input type="email" name="email" value="<?= @$_SESSION['old']['email']; ?>">

				<span class="description">Password</span>
				<input type="password" name="password">

				<span class="description">Confirm password</span>
				<input type="password" name="password_2">

		<!-- 		<span class="description">Profile picture</span>
				<input type="file" name="avatar" style="padding: 7px;"> -->

				<!-- <div class="captcha">
					
				</div> -->
				<div class="g-recaptcha" data-sitekey="<?= $captcha_public_key; ?>"></div>

				<button type="submit" name="do_signup">Register</button>

				<div class="errors">
					<?= @$_SESSION['errors']; ?>
					<?php unset($_SESSION['errors']); unset($_SESSION['old']); ?>
				</div>

		<!-- 		<p class="link">
					Already have an account? - <a href="login.php">Login!</a>
				</p> -->

				<?php
					// if( isset( $_SESSION['errors'] ) ){
					// 	echo '<div class="errors">'. '<ion-icon class="icon" name="close-circle"></ion-icon><p>'.$_SESSION['errors'] . '</p></div>';
					// }
					// unset($_SESSION['errors']);
					// unset($_SESSION['old']);
				 ?>
			</form>
			<span class="link">Have account? <a href="login.php">Sign In</a></span>
		</div>
	</div>
</body>
</html>

<?php } ?>