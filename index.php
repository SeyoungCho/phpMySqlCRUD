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

$update = '';
$delete = '';
if(isset($_GET['id'])){

	$sql = "SELECT * FROM topic WHERE id={$_GET['id']}";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	$article['title'] = $row['title'];
	$article['description'] = $row['description'];
	$update = '<a href="update.php?id='.$_GET['id'].'">Update</a>';
	$delete = '
		<form action="process_delete.php" method="POST">
			<input type="hidden" name="id" value="'.$_GET['id'].'">
			<input type="submit" value="Delete"/>
		</form>';
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
	<a href="create.php">Create</a>
	<?=$update?>
	<?=$delete?>
	<h2><?=$article['title']?></h2>
	<p><?=$article['description']?></p>
</body>
</html>
