<?php
  session_start();
  include_once 'connection.php';
  $author = $_POST['authorname'];
  $sql = "INSERT INTO authors (authorID, author) VALUES (NULL, '$author')";
  $result=mysqli_query($con,$sql);
  echo "Author .$author. has been added successfully!";
  header( "refresh:3;url=showauthors.php" );
  echo 'You will be redirect to the Authors List shortly';
?>
