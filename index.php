<?php
session_start(); 
?>



<?php 
$con=mysqli_connect("localhost","root","","bookshelf");
// Check connection
if (mysqli_connect_errno($con))   {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
} 
$sql = "SELECT title, url, author, books.authorID FROM books, authors WHERE books.authorID = authors.authorID order by title";
$result = mysqli_query($con,$sql); 
//echo mysqli_num_rows($result);
while($row = mysqli_fetch_array($result)) {
	echo '<a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a> by ';
	echo '<a href="authorbooks.php?authorID='.$row['authorID'].'">'.$row['author'].'</a>';
	echo '<br>';
}
mysqli_close($con);  
?>