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
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>bookshelf</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="index.php">Books by Authors</a></li>
                    <li><a href="showauthors.php">Authors List</a></li>
                    <li><a href="showbooks.php">Books List</a></li>
                </ul>
            </div>
        </nav>
        <h1>Edit book</h1>
        <form method="post" action="editbook.php">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="<?php echo $row['title'] ?>">
            <input type="hidden" name="bookID" value="<?php echo $bookID ?>">
            <br>
            <button class="btn-primary btn-sm w3-green" onclick="location.href='showbooks.php'" type="submit">Submit</button>
            <button class="btn-primary btn-sm w3-red" onclick="location.href='showbooks.php'" type="button">Cancel</button>
        </form>
    </body>

    </html>
