<?php

$conn = mysqli_connect(
	'localhost', 
	'cse20161646', 
	'ab4798', 
	'db_cse20161646'
);
$sql = "SELECT * FROM topic LIMIT 1000";
$result = mysqli_query($conn, $sql);

if($result === FALSE){
	echo '글 목록을 가져오는 과정에서 에러가 발생하였습니다.';
}

$row = mysqli_fetch_array($result);
while($row = mysqli_fetch_array($result)){
	echo '<h2>'.$row['title'].'</h2>';
	echo $row['description'];
}
?>
