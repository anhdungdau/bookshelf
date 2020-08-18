<?php
  session_start();
  include_once 'connection.php';
?>

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>showAuthors</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
    <div>
        <h1>Authors List</h1>
    </div>
    <button class="w3-button w3-green" onclick="location.href='addauthor.html'" type="button">Add author</button>
    <table id="bookshelf">
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
            $sql = "SELECT * FROM authors ORDER BY authorID";
            $result=mysqli_query($con,$sql);
            while($row=mysqli_fetch_array($result)) {
        ?>
        <tr>
            <td>
                <?php echo $row['authorID'];?>
            </td>
            <td>
                <?php echo $row['author'];?>
            </td>
            <td>
                <?php echo 'Edit';?>
            </td>
            <td>
                <?php echo 'Delete';?>
            </td>
        </tr>
        <?php } ?>
    </table>
<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>
</body>
</html>