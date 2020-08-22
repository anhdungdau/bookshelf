<?php
  session_start();
  include_once 'connection.php';
  $con = mysqli_connect("localhost","root","","bookshelf");
  $bookID = mysqli_real_escape_string($con,$_GET['bookID']); 
  $sql = "DELETE FROM authors WHERE bookID = ".$bookID;
  $result=mysqli_query($con,$sql);
  $sql = "DELETE FROM books WHERE bookID = ".$bookID;
  $result=mysqli_query($con,$sql);
  echo "Author and related book(s) have been deleted successfully!"."<br>";
  header( "refresh:2;url=showbooks.php" );
  echo 'You will be redirect to the Books List shortly';
?>