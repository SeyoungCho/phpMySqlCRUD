<?php
$conn = mysqli_connect(
	'localhost', 
	'cse20161646', 
	'ab4798', 
	'db_cse20161646'
);	
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){
	$list = $list."<li>
		<a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
}
$article = array(
	'title'=>'Welcome',
	'description'=>'Hello, Web'
);
if(isset($_GET['id'])){

	$sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$article['title'] = $row['title'];
	$article['description'] = $row['description'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf=8">
	<title>WEB</title>
</head>
<body>
	<h1><a href="index.php">WEB</a></h1>
	<ol>
		<?= $list ?>
	</ol>
	<form action="process_create.php" method="POST">
		<p><input type="text" name="title" placeholder="Title" /></p>	
		<p><textarea name="description" placeholder="Description" ></textarea></p>
		<p><input type="submit" value="Submit" /> </p>	
</body>
</html>
		
