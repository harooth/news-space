<?php
require "db.php";

$data = $_POST;

if(isset($_SESSION["temp_user"]["email"]))
{
	// echo $_SESSION["temp_user"]["code"];
	// echo "Please enter the verification code, that we sent on your email";

	if(isset($data['button_confirm_email']))
	{
		$user = R::findone('users', 'email = ?', array($_SESSION['temp_user']['email']));
		// if($user) echo("ok");

		// print_r($user);
		// echo $user->id;
		if(password_verify($data['input_confirm_email'], $user->verif_code))
		{
			$user->email_verified = "1";
			R::store($user);
			unset($_SESSION['temp_user']);
			$_SESSION['user'] = [
						"username" => $user->username,
						"email" => $user->email,
						"avatar" => $user->avatar
					];
			unset($_SESSION['temp_user']);
			header("Location: ../index.php");
		}
		
		else
		{			// echo "no";
			$_SESSION['errors'] = "Incorrect verification code!";
			// header("Location: confirm.php");
		}
		//session[errors]
	}
}
else
	header("Location: ../index.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Confirm email</title>
	<link rel="stylesheet" href="css/styleo.css">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap" rel="stylesheet">
	<style>
		.container
		{
			padding-bottom: 30px;
		}
	</style>
</head>
<body>
	<div class="main">
		<div class="container">
			<form action="confirm.php" method="post">
				<span class="description">Enter 4-digit verification code:</span>
				<input type="number" name="input_confirm_email" oninput="if (this.value.length > 4) this.value = this.value.slice(0, 4);">
				<button type="submit" name="button_confirm_email">Submit</button>

				<div class="errors">
					<?= @$_SESSION['errors']; ?>
					<?php unset($_SESSION['errors']); unset($_SESSION['old']); ?>
				</div>
			</form>
		</div>
	</div>
</body>
</html>


<?php
//temp_user - en userna, ov vor petqa verifikacia ancni

?>

