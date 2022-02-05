<?php 

require "../auth/db.php";

if(!isset($_SESSION['user'])) {
	header("Location: ../auth/login.php");
} else {
?>

<form action="action.php" method="post" style="max-width: 500px;" class="addingForm">
	<hr>
	<p>News title</p><input type="text" name="title"><hr>
	<p>News excerpt(Optional, if you won't fill this field, it will filled automaticelly)</p><input type="text" name="excerpt"><br><br><hr>

	<p>Content</p><textarea cols="30" rows="10" name="content"></textarea><br><br>
	<hr>
	<div class="category-div">
		<span>Category:</span>
		<select name="category" class="category">
			<option value="uncategorized">Select</option>
		    <option value="Sport">Sport</option>
		    <option value="Culture">Culture</option>
		    <option value="Nature">Nature</option>
		    <option value="Travel">Travel</option>
		    <option value="Music">Music</option>
		    <option value="IT">IT</option>
		    <option value="Health">Health and Beauty</option>
		    <option value="Weather">Weather</option>
		</select>
	</div>
	
	<hr>
	<button type="submit" name="addNews">Submit</button>
	<hr>
</form>


<?php
}



?>
<script src="script.js"></script>