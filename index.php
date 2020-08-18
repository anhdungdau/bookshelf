<?php
  session_start();
  include_once 'connection.php';
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bookshelf</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div class="w3-container w3-green">
        <h1>Welcome to my Bookshelf</h1>
    </div>
    <div class="w3-row-padding">
        <div class="w3-half">
            <h2><a href="showauthors.php">List of Authors</a></h2>
            <img src="img/author.jpg" style="max-width:100%;height:auto;">
        </div>
        <div class="w3-half">
            <h2><a href="showbooks.php">List of Books</a></h2>
            <img src="img/bookshelf.jpg" style="max-width:100%;height:auto;">
        </div>
    </div>
</body>
</html>