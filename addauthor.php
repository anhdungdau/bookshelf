<?php
$con = mysqli_connect("localhost","root","","bookshelf");

$author = $_POST['authorname'];

$sql = "INSERT INTO authors (authorID, author) VALUES (NULL, '$author')";

$result=mysqli_query($con,$sql);

echo "Author added: ".$author;

?>