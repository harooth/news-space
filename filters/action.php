<?php 
require "auth/db.php";
$data = $_GET;

if(isset($data['submit']))
{
	if(isset($data['user']))
	{
		$news = R::findAll('users', 'user = ?', array($data['user']));
	}
}


?>