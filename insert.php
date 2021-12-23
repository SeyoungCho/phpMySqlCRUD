<?php
$conn = mysqli_connect(
	"localhost", 
	"cse20161646",
	"ab4798", 
	"db_cse20161646"
);	
$sql = 	"
		 INSERT INTO topic 
			(title, description, created)
		 VALUES (
			'MySQL',
			'MySQL is ...',
			NOW()
		 )
		";
$result = mysqli_query($conn, $sql);

if($result == FALSE){
	echo mysqli_error($conn);
}

?>
