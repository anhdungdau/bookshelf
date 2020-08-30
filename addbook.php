<?php
  include_once 'connection.php';
$sql = "select * from authors order by author";
$result=mysqli_query($con,$sql);

if (isset($_POST['title'])){
	$title = mysqli_real_escape_string($con,$_POST['title']);
	$authorID = mysqli_real_escape_string($con,$_POST['authorID']);
	$url = mysqli_real_escape_string($con,$_POST['url']);
	$sql = "insert into books (bookID, title, url, authorID) values (NULL,'$title','$url',$authorID)";
	
    //echo $sql;
	$result2=mysqli_query($con,$sql);
	if($result2==1) {
		echo "The book .$title. has been added to the bookshelf!";
         header( "refresh:3;url=showbooks.php" );
        echo 'You will be redirected to the Books List shortly';
	}
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
    <div>
        <h1>Add Book</h1>
    </div>
    <form method="POST" action="addbook.php">
        Author:
        <select name="authorID">
            <?php
                while($row=mysqli_fetch_array($result)) {
                    echo '<option value="'.$row['authorID'].'">'.$row['author'].'</option>';
                }
            ?>
        </select><br>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title"><br>
        <label for="url">URL:</label>
        <input type="text" name="url" id="url"><br>
        <button class="btn-primary btn-sm w3-green" onclick="location.href='showbooks.php'" type="submit">Submit</button>
        <button class="btn-primary btn-sm w3-red" onclick="location.href='showbooks.php'" type="button">Cancel</button>
    </form>
</body>

</html>