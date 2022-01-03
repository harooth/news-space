<?php
	require_once('phpmailer/PHPMailerAutoload.php');
		$mail = new PHPMailer;

		$mail->isSMTP();
		$mail->Host = 'smtp.mail.ru';

		$mail->SMTPAuth = true;
		$mail->Username = 'nortest18@mail.ru';
		$mail->Password = '3Bheb0TkNZV4UzbXsSzs';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom('nortest18@mail.ru');

		$mail->Subject = 'Confirm';
?>