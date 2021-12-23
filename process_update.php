<?php
	$conn = mysqli_connect(
		'localhost', 
		'cse20161646', 
		'ab4798', 
		'db_cse20161646'
	);
	$filtered = array(
		'id'=>mysqli_real_escape_string($conn, $_POST['id']),
		'title'=>mysqli_real_escape_string($conn, $_POST['title']),
		'description'=>mysqli_real_escape_string($conn, $_POST['description'])
		
	);
	$sql = "UPDATE topic
				SET
					title='{$filtered['title']}',
					description='{$filtered['description']}'
				WHERE
					id={$filtered['id']}
	";
	
	$result = mysqli_query($conn, $sql);
	$url = "index.php?id=".$filtered['id'];
	if($result === FALSE){
		echo '수정하는 과정에서 문제가 발생했습니다.';
	}else{
		echo '성공했습니다. <a href='.$url.' >돌아가기</a>';
	}
?>

