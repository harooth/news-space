<?php 

require "../auth/db.php";
$data = $_GET;
?>

<form action="index.php" method="get">
	<input type="text" placeholder="User" name="user" value="<?=@$_GET['user'] ?>">
	<input type="date" name="date" value="<?=@$_GET['date'] ?>">
	<!-- <select id="cars" name="user" size="1" multiple>
	    <option value="admin">admin</option>
	    <option value="rustam">Rustam</option>
	</select> --><br><br>
	<button type="submit">Submit</button>

</form>

<?php

$news = '';



if((trim($data['user']) != '') && ($data['date']) != ''){
	$news = R::findAll('news', 'user = ? and date = ?', array($data['user'], $data['date']));
	
}
else if(trim($data['user']) != '')
{
	$news = R::findAll('news', 'user = ?', array($data['user']));

} else if(trim($data['date']) != '')
{
	$news = R::findAll('news', 'date = ?', array($data['date']));
}

if(!$news)
{
	echo 'Nothing found';
} else 
{
	foreach ($news as $item) {
		echo @$item->id.'<br>';
	}
}




?>