<?php
  session_start();
  include_once 'connection.php';

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
        <h1>Edit Author</h1>
        <form method="post" action="editauthor.php">
            <label for="author">Author name:</label>
            <input type="text" name="authorname" id="author" value="<?php echo $row['author'] ?>">
            <input type="hidden" name="authorID" value="<?php echo $authorID ?>">
            <br>
            <button class="btn-primary btn-sm w3-green" onclick="location.href='showauthors.php'" type="submit">Submit</button>
            <button class="btn-primary btn-sm w3-red" onclick="location.href='showauthors.php'" type="button">Cancel</button>
        </form>
    </body>

    </html>
