<?php include "header.php"; ?>

<div class="container">
	<div class="news">
		<?php $data = R::load('news', $_GET['id']); 
		if($data->id == 0)
		{
			header("Location: ../index.php");
		} else {
		?>
		<h3 style="font-size: 32px"><?= $data->title; ?></h3>
		<img src="images/featured.jpg" style="max-width: 500px; text-align: center;"><br>
		<p><?= $data->content; ?></p>
		<?php } ?>
	</div>
</div>
</div>
<script src="../script.js"></script>
<!-- <script src="../test.js"></script> -->
	