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
					<p>Filters:</p>
					<!-- <div class="category-div"> -->
						<span>Category:</span>
						<select name="category" class="news-category">
							<option value="">Select</option>
						<?php 
							$categories = array(
								"Sport" => "Sport",
								"Travel" => "Travel",
								"Health" => "Health and Beauty",
								"Music" => "Music",
								"IT" => "IT",
								"Weather" => "Weather"
							);
							foreach ($categories as $key => $value) { ?>
								<option value="<?=$key; ?>" <?php if($_GET['category'] == $value) echo "selected"; ?>>
									<?=$value; ?>
								</option>
							<?php } ?>
						</select>
						
							<!-- <option value="">Select</option>
						    <option value="Sport">Sport</option>
						    <option value="Culture">Culture</option>
						    <option value="Nature">Nature</option>
						    <option value="Travel">Travel</option>
						    <option value="Music">Music</option>
						    <option value="IT">IT</option>
						    <option value="Health">Health and Beauty</option>
						    <option value="Weather">Weather</option> -->
						
					<!-- </div> -->
					<input class="news-input-date" type="date" name="date">
					<input class="news-input-user" type="text" name="user" placeholder="User">
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

					 	<p class="news-info">
					 		Added by:&nbsp;
					 		<a href="news/archive.php?user=<?= $news->user; ?>">
					 			<?= $news->user; ?>
					 		</a>,&nbsp;
				 			<a href="news/archive.php?date=<?= $news->date; ?>">
				 				<?php echo $news->date; ?>
			 				</a>

			 				<?php if(isset($news->category) && $news->category !='uncategorized'): ?>,&nbsp;
				 				<a href="news/archive.php?category=<?=$news->category; ?>">
				 					<?=$news->category; ?>
				 				</a>
			 				<?php endif; ?>

			 				<?php if(isset($news->sub_category) && $news->sub_category !='uncategorized'): ?>
			 					&nbsp;>&nbsp;
				 				<a href="news/archive.php?sub_category=<?=$news->sub_category; ?>">
				 					<?=$news->sub_category; ?>
				 				</a>
			 				<?php endif; ?>
					 	</p>
					 </div>
				 </div>
				 

			</div>
			<?php } //foreach ?>
		</div>
	

	<script src="script.js"></script>
</body>
</html>