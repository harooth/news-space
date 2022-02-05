<?php include "header.php"; ?>
	<div class="container">
			<!-- <div class="news"> -->
				<div class="news">
					<form action="archive.php" method="get">
						<p>Filters:</p>
						<!-- <div class="category-div"> -->
							<span>Category:</span>
							<!-- <select name="category" class="news-category">
								<option value="">Select</option>
							    <option value="Sport">Sport</option>
							    <option value="Culture">Culture</option>
							    <option value="Nature">Nature</option>
							    <option value="Travel">Travel</option>
							    <option value="Music">Music</option>
							    <option value="IT">IT</option>
							    <option value="Health">Health and Beauty</option>
							    <option value="Weather">Weather</option>
							</select> -->
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
									<option value="<?=$key; ?>" <?php if($_GET['category'] == $key) echo "selected"; ?>>
										<?=$value; ?>
									</option>
							<?php } ?>
							</select>
						<!-- </div> -->
						<input class="news-input-user" type="text" name="user" placeholder="User" value="<?=@trim($_GET['user']); ?>">
						<input class="news-input-date" type="date" name="date" value="<?=$_GET['date']; ?>">
						<input type="submit" class="news-input-submit">
					</form>
				</div>
				<?php
					
					// $data = $_GET;
					$user = trim($_GET['user']);
					$date = trim($_GET['date']);
					$category = trim($_GET['category']);
					$sub_category = trim($_GET['sub_category']);

					$query_keys  = [];
					$query_values = [];
					if($user != '')
					{
						array_push($query_keys, 'user = ?');
						array_push($query_values, $user);
					}
					if($date != '')
					{
						array_push($query_keys, 'date = ?');
						array_push($query_values, $date);
					}
					if($category != '' && $category !='uncategorized')
					{
						array_push($query_keys, 'category = ?');
						array_push($query_values, $category);
					}
					if($sub_category != '')
					{
						array_push($query_keys, 'sub_category = ?');
						array_push($query_values, $sub_category);
					}


					//array to string using seperator 'and'
					if(!$query_keys)
					{
						$news = '';
					} else 
					{
						$query = implode(" and ", $query_keys);
						$query = $query." ORDER BY id DESC";
						$news = R::findAll('news', $query, $query_values);
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
								 	
								 	<p class="news-content"><?= $item->excerpt."...  "; ?><a href="single.php?id=<?= $item->id; ?>">Read more></a></p>
								 	<p class="news-info">
								 		Added by:&nbsp;
								 		<a href="archive.php?user=<?= $item->user; ?>">
								 			<?= $item->user; ?>
								 		</a>,&nbsp;

								 		<a href="archive.php?date=<?= $item->date; ?>">
							 				<?php echo $item->date; ?>
						 				</a>

								 		<?php if(isset($item->category) && $item->category !='uncategorized'): ?>,&nbsp;
							 				<a href="archive.php?category=<?=$item->category; ?>">
							 					<?=$item->category; ?>
							 				</a>
						 				<?php endif; ?>

						 				<?php if(isset($item->sub_category) && $item->sub_category !='uncategorized'): ?>
						 					&nbsp;>&nbsp;
							 				<a href="archive.php?sub_category=<?=$item->sub_category; ?>">
							 					<?=$item->sub_category; ?>
							 				</a>
						 				<?php endif; ?>
								 	</p>
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
