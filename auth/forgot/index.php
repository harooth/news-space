<?php 

	require "../db.php";

	if(isset($_POST['jeko']))
	{
		if(trim($_POST['username']) != '')
		{
			$user = R::findone('users', 'username = ? OR email = ?', array($_POST['username'], $_POST['username']));
			if($user)
			{
				$code = mt_rand(1111,9999);

					$user->verif_code = password_hash($code, PASSWORD_DEFAULT);
					R::store($user);

					$_SESSION['temp_user'] = [
							"email" => $user->email
						];

					// $mail->addAddress($user->email);
					// $mail->Body    = $code;
					// $mail->send();

					mail($user->email, "Verification", $code);

					header("Location: confirm.php");

			} else $_SESSION['errors'] = "Nothing found out!";
		} else $_SESSION['errors'] = "Enter email";
	}
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
		<div class="container" style="padding-bottom: 30px;">
			<form action="index.php" method="post">

				<span class="description">Enter username or password you remember:</span>

				<input type="text" name="username" required>
				<button type="submit" name="jeko">Submit</button>

				<div class="errors">
					<?= @$_SESSION['errors']; ?>
					<?php unset($_SESSION['errors']); ?>
				</div>
			</form>
		</div>
	</div>
</body>
</html>