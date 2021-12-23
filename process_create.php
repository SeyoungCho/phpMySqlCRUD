<?php
$conn = mysqli_connect(
	'localhost', 
	'cse20161646', 
	'ab4798', 
	'db_cse20161646'
);

$sql = "
	INSERT INTO topic
	(title, description, created)
	VALUES(
		'{$_POST["title"]}',
		'{$_POST["description"]}',
		NOW()
	)
";

$result = mysqli_query($conn, $sql);

if($result === FALSE){
	echo '저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의하세요';
	error_log(mysqli_error($conn));
}else{
	echo '저장에 성공했습니다. <a href="index.php">돌아가기</a>';
}

?>
