<?php include "header.php"; ?>
	<div class="container">
			<!-- <div class="news"> -->
				<div class="news">
					<form action="archive.php" method="get">
						<span>Filters:</span>
						<input class="news-input-user" type="text" name="user" placeholder="User" value="<?=$_GET['user']; ?>">
						<input class="news-input-date" type="date" name="date" value="<?=$_GET['date']; ?>">
						<input type="submit" class="news-input-submit">
					</form>
				</div>
				<?php
					
					$data = $_GET;
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
						echo '<div class="news">Nothing found</div>';
					} else 
					{
					foreach ($news as $item) {
						?>
						<div class="news">
							<h3 class="news-title">
							 	<a href="single.php?id=<?php echo $item->id; ?>">
							 		<?php echo htmlspecialchars($item->title); ?>
							 	</a>
							 </h3>
							 <div class="news-div">
								 <img src="images/featured.jpg" alt="Featured image" class="featured-image">

								 <div class="news-container">
								 	
								 	<p class="news-content"><?php echo $item->excerpt."...  "; ?><a href="single.php?id=<?= $item->id; ?>">Read more></a></p>
								 	<p class="news-info">Added by <a href="archive.php?user=<?= $item->user; ?>"><?php echo $item->user; ?>,</a> <?php echo $item->date; ?></p>
								 </div>
							 </div>
						</div>
					<?php
							}
						}
			 		?>
			<!-- </div> -->
	</div>
</div>
<script src="../script.js"></script>
<!-- <script src="../test.js"></script> -->
