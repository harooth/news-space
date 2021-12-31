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
	<title>Login</title>
	<link rel="stylesheet" href="css/styleo.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">

<!-- 	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script> -->
	<!-- <script src="https://kit.fontawesome.com/262f18fa2f.js" crossorigin="anonymous"></script> -->
</head>
<body>
	<div class="main">
		<div class="container">
			<form action="action.php" method="post">
				<span class="title">Sign In</span>
				
				<span class="description">Username or e-mail</span>
				<input type="text" name="username" value="<?= @$_SESSION['old']['username']; ?>"><br>

				<div class="pass">
					<span class="description">Password</span>
					<a href="">Forgot password?</a>
				</div>
				<input type="password" name="password"><br>

				<button type="submit" name="do_login">Sign In</button>
				<!-- <p class="link">
					Still don't have an account? - <a href="signup.php">Create account!</a>
				</p> -->
				<div class="errors">
					<?= @$_SESSION['errors']; ?>
					<?php unset($_SESSION['errors']); unset($_SESSION['old']); ?>
				</div>

				<div class="social-media">
					<div class="facebook">
						<svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-square" class="svg-inline--fa fa-facebook-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z"></path></svg>
						<span>Facebook</span>
					</div>

					<div class="google">
						<img src="icon-google.png" alt="">
						<span>Google</span>
					</div>
				</div>
			</form>

			<span class="link">Not a member? <a href="signup.php">Sign up now</a></span>
		</div>
	</div>
</body>
</html>

<?php } ?>