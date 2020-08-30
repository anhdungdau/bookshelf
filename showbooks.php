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
        <h1>Books List</h1>
    </div>
    <button class="btn-primary btn-sm w3-green" onclick="location.href='addbook.php'" type="button">Add book</button>
    <table id="bookshelf">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>URL</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            $sql = "SELECT * FROM books ORDER BY bookID";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td>
                <?php echo $row['bookID'];?>
            </td>
            <td>
                <?php echo '<a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a>';?>
            </td>
            <td>
                <?php echo '<a href="'.$row['url'].'" target="_blank">'.$row['url'].'</a>';?>
            </td>
            <td>
                <?php echo '<a href="editbook.php?bookID='.$row['bookID'].'">Edit</a>';?>
            </td>
            <td>
                <?php echo '<a href="deletebook.php?bookID='.$row['bookID'].'">Delete</a>';?>
            </td>
        </tr>
        <?php 
        }
        mysqli_close($con);  
        ?>
    </table>
</body>
</html>
