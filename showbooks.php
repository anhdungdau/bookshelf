<?php
  session_start();
  include_once 'connection.php';
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>showBooks</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
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
                <?php echo $row['title'];?>
            </td>
            <td>
                <?php echo $row['url'];?>
            </td>
            <td>
                <?php echo '<a href="editbook.php?bookID='.$row['bookID'].'">Edit</a>';?>
            </td>
            <td>
                <?php echo '<a href="deletebook.php?bookID='.$row['bookID'].'">Delete</a>';?>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
