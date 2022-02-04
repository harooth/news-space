<?php 
require "auth/db.php";

$data = R::findAll('news', 'month(date) = ?', array('2'));
foreach($data as $item)
{
    echo $item->id.'<br>';
}
// print_r($data);
// echo '<h1>barev</h1>';
// echo htmlspecialchars('<strong>This shows HTML tags</strong>')


 ?>