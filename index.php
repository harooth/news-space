<?php include "header.php"; ?>

		<div class="banner">
			 <div class="galaxy"></div>

			 <h1>#1 Galaxy news</h1>
			 <h2>Hot news from each corner of space</h2>
		</div>
	</div> 
	<!-- closing div from header.php main div -->

		<div class="pstik-text">
			<h3>Now let's see what's going on around us! Here are news from your planet!</h3>
		</div>

		<div class="container">
			<div class="news">
				<form action="news/archive.php" method="get">
					<span>Filters:</span>
					<input class="news-input-user" type="text" name="user" placeholder="User">
					<input class="news-input-date" type="date" name="date">
					<input type="submit" class="news-input-submit">
				</form>
			</div>
			<?php 
				$data = R::findAll('news', 'confirmed = ? ORDER BY id DESC', [0]);
				foreach($data as $news) {
			 ?>
			<div class="news">
				
				 <h3 class="news-title">
				 	<a href="news/single.php?id=<?php echo $news->id; ?>">
				 		<?php echo htmlspecialchars($news->title); ?>
				 	</a>
				 </h3>
				 <div class="news-div">
					 <img src="news/images/featured.jpg" alt="Featured image" class="featured-image">

					 <div class="news-container">
					 	
					 	<p class="news-content"><?php echo $news->excerpt."...  "; ?><a href="news/single.php?id=<?= $news->id; ?>">Read more></a></p>
					 	<p class="news-info">Added by <a href="news/archive.php?user=<?= $news->user; ?>"><?php echo $news->user; ?>,</a> <a href="news/archive.php?date=<?= $news->date; ?>"><?php echo $news->date; ?></a></p>
					 </div>
				 </div>
				 

			</div>
			<?php } //foreach ?>
		</div>
	

	<script src="script.js"></script>
</body>
</html>