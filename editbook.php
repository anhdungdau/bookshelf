<?php
  session_start();
  include_once 'connection.php';

if (isset($_GET['bookID'])) {
	// called from showbooks.php, get the book details ready to show in the form
	$bookID = $_GET['bookID'];
	$sql = "select * from books where bookID = ".$bookID;
	$result=mysqli_query($con,$sql);
	$row=mysqli_fetch_array($result);
} elseif (isset($_POST['bookID'])) {
	// called from the editbook.php form being submitted
	// update the record in the database somehow
	$title = $_POST['title'];
	$bookID = $_POST['bookID'];
	$sql = "update books set title = '".$title."' where bookID = ".$bookID;
	$result=mysqli_query($con,$sql);
	header('Location: showbooks.php');
}
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>Edit book</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>
	<body>
	    <h1>Edit book</h1>
        <form method="post" action="editbook.php">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo $row['title'] ?>">
            <input type="hidden" name="bookID" value="<?php echo $bookID ?>"><br>
            <button class="btn-primary btn-sm w3-green" onclick="location.href='showbooks.php'" type="submit">Submit</button>
            <button class="btn-primary btn-sm w3-red" onclick="location.href='showbooks.php'" type="button">Cancel</button>
        </form>
	</body>
</html>