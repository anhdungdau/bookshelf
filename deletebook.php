<?php

$con = mysqli_connect("localhost","root","","bookshelf");
$bookID = mysqli_real_escape_string($con,$_GET['bookID']);
$sql = "DELETE FROM books WHERE bookID = ".$bookID;
$result=mysqli_query($con,$sql);
header('Location: showbooks.php');

?>