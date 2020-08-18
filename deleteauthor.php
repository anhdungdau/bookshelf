<?php
  session_start();
  include_once 'connection.php';
  $con = mysqli_connect("localhost","root","","bookshelf");
  $authorID = mysqli_real_escape_string($con,$_GET['authorID']); 
  $sql = "DELETE FROM books WHERE authorID = ".$authorID;
  $result=mysqli_query($con,$sql);
  $sql = "DELETE FROM authors WHERE authorID = ".$authorID;
  $result=mysqli_query($con,$sql);
  echo "Author and related books have been deleted successfully!"."<br>";
  header( "refresh:2;url=showauthors.php" );
  echo 'You will be redirect to the Authors List shortly';
?>