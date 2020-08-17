<?php
$con = mysqli_connect("localhost","root","","bookshelf");
$sql = "select * from authors order by author";
$result=mysqli_query($con,$sql);
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Authors</title>
	</head>
	<body>
		
				<?php
					while($row=mysqli_fetch_array($result)) {
						echo $row['author'].' <a href="editauthor.php?authorID='.$row['authorID'].'">edit</a> <br>';
					}
				?>
			
	</body>
</html>