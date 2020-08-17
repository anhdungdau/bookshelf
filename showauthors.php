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
</head>
<body>
    <div>
        <h1>Authors List</h1>
    </div>
    <button class="open-button" onclick="openForm()">Add author</button>
    <div class="form-popup" id="myForm">
      <form method="GET" class="form-container">
        <input type="text" placeholder="Enter author name here" name="authorname" required>
        <button type="submit" class="btn">Submit</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Cancel</button>
      </form>
    </div>
    <?php
      $author = $_GET['authorname'];
      $sql = "INSERT INTO authors (authorID, author) VALUES (NULL, '$author')";
      $result=mysqli_query($con,$sql);
      echo "Author".$author."has been added!";
    ?>
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