<?php
	require_once('phpmailer/PHPMailerAutoload.php');
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'smtp.mail.ru';

		$mail->SMTPAuth = true;
		$mail->Username = 'artempubg58@mail.ru';
		$mail->Password = 'rUpXLhKZ5c8patvG9fcw';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom('artempubg58@mail.ru');

		$mail->Subject = 'Confirm';
?>