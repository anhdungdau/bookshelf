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
		<h1>This is the books list written by this author</h1>
	</body>
</html>

<?php 
session_start();
include_once 'connection.php';
// Check connection
if (mysqli_connect_errno($con))   {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
$aid = $_GET['authorID'];
$aid = mysqli_real_escape_string($con,$aid);
//echo $aid;
$sql = "SELECT * FROM books WHERE authorID = ".$aid;
$result = mysqli_query($con,$sql); 
//echo mysqli_num_rows($result);
while($row = mysqli_fetch_array($result)) {
	echo '<a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a><br>';
}
mysqli_close($con);  
?>