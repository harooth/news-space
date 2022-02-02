<?php 

require "../auth/db.php";

if(!isset($_SESSION['user'])) {
	header("Location: ../auth/login.php");
} else {
?>

<form action="action.php" method="post">
	<p>Enter news title</p><input type="text" name="title">
	<p>Enter Excerpt(Optional, if you won't fill this field, it will filled automaticelly)</p><input type="text" name="excerpt">
	<p>Enter Excerpt(optional)</p><textarea cols="30" rows="10" name="content"></textarea><br>
	<button type="submit" name="addNews">Submit</button>
</form>


<?php
}



?>