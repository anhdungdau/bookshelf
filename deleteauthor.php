<?php

$con = mysqli_connect("localhost","root","","bookshelf");

$authorID = mysqli_real_escape_string($con,$_GET['authorID']);

$sql = "DELETE FROM books WHERE authorID = ".$authorID;
$result=mysqli_query($con,$sql);

$sql = "DELETE FROM authors WHERE authorID = ".$authorID;
$result=mysqli_query($con,$sql);

header('Location: showbooks.php');

?>