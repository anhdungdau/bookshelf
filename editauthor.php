<?php

$con = mysqli_connect("localhost","root","","bookshelf");
if (isset($_GET['authorID'])) {
	// called from showauthors.php, get the author details ready to show in the form
	$authorID = $_GET['authorID'];
	$sql = "select * from authors where authorID = ".$authorID;
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
} elseif (isset($_POST['authorID'])) {
	// called from the editauthor.php form being submitted
	// update the record in the database somehow
	$author = $_POST['authorname'];
	$authorID = $_POST['authorID'];
	$sql = "update authors set author = '".$author."' where authorID = ".$authorID;
	$result=mysqli_query($con,$sql);
	header('Location: showauthors.php');	
}
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Edit author</title>
	</head>
	<body>
		<form method="post" action="editauthor.php">
			<label for="author">Author name:</label>
			<input type="text" name="authorname" id="author" value="<?php echo $row['author'] ?>">
			<input type="hidden" name="authorID" value="<?php echo $authorID ?>">
		</form>
	</body>
</html>