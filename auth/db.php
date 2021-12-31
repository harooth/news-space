<?php 
	session_start();
	require "libs/rb.php";

	R::setup('mysql:host=localhost;dbname=auth_using_redbnphp',  'root', '');
	$captcha_public_key = '6LfcRNwdAAAAAHEhPDdLffbUllSOqBhjoJSB6GcL'; //for div(captcha) blok
	$captcha_private_key = '6LfcRNwdAAAAAJvvTYVoy1Tr4XXOWT4YCKB7Nt5G'; //for captcha request url


	// $captcha_public_key = '6LcsOd8dAAAAAM0EhI9bnUiHZukaXHeFLMBTyEsJ';
	// $captcha_private_key = '6LcsOd8dAAAAABneAlCDtcKRUCaY8_KTgzWHcbj-';
	//R::setup('mysql:host=localhost;dbname=id17107342_auth', 'id17107342_localhost', '_AH1V_?2MV|S76Ww');

 ?>