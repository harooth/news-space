<?php 

require "../auth/db.php";
$data = $_POST;
if(!isset($data['addNews'])) {
	header("Location: addNews.php");
} else {

$excerpt = $data['excerpt'];

if(trim($data['excerpt']) == '')
{
	$excerpt = mb_substr($data['content'], 0, mb_strpos($data['content'], " ", 280)); 
}

$news = R::dispense('news');
$news->title = $data['title'];
$news->excerpt = $excerpt;
$news->content = $data['content'];
$news->user = $_SESSION['user']['username'];
$news->date = date('Y-m-d');
$news->category = @$data['category'];
$news->sub_category = @$data['subcategory'];
$news->confirmed = 0;
R::store($news);
// echo "<br>".$data['category']."<br>";
// echo $data['subcategory'];
}
header("Location: ../");

// $data = R::findAll('news');
// foreach($data as $news)
// {
// 	echo $news->title." ".$news->excerpt."<br>";
// }
// $text = "Knowledge is a natural right of every human being ofhgjhgj which no one
// 					has the right to deprive him or her under any pretext, except in a case where a
// 					person does something which deprives him or her of that right. It is mere
// 					stupidity to leave its benefits to certain individuals and teams who monopolize
// 					these while the masses provide the facilities and pay the expenses for the
// 					establishment of public sports.";

// minchev 100 taranoc texti verjin bary
// $text_truncated = mb_substr($text, 0, mb_strpos($text, " ", 100));
//Knowledge is a natural right of every human being ofhgjhgj which no one has the right to deprive 

// just 100symbols
// $text_truncated = mb_substr($text, 0, 100); 

// echo $text_truncated;





?>