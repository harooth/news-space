<?php 
	require "../db.php";

	if(isset($_SESSION['temp_user']))
	{
		if(isset($_POST['change']))
		{
			if($_POST['pass1'] == $_POST['pass2'])
			{
				//
				$user = R::findone('users', 'email = ?', array($_SESSION['temp_user']['email']));
				$user->password = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
				R::store($user);
				unset($_SESSION['temp_user']);
				header("Location: ../login.php");
			} else $_SESSION['errors'] = "Password's aren't the same";
		}

	} else header("Location: ../login.php");



 ?>






<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css/styleo.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">
		<div class="container">
			<form action="newpass.php" method="post">
				<span class="description">New password</span>
				<input type="password" name="pass1">

				<span class="description">Confirm new password</span>
				<input type="password" name="pass2">
				<button name="change">Change Password</button>

				<div class="errors">
					<?= @$_SESSION['errors']; ?>
					<?php unset($_SESSION['errors']); ?>
				</div>
			</form>
		</div>
	</div>
</body>
</html>