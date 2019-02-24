<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Book Detail</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Book Detail</h1>

<?php
  include("admin/confs/config.php");
  $id = $_GET['id'];
  $books = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
  $row = mysqli_fetch_assoc($books);
?>

<div class="detail">
  <a href="index.php" class="back">&laquo; Go Back</a>

  <img src="admin/covers/<?php echo $row['cover'] ?>">
  <h2><?php echo $row['title'] ?></h2>
  <i>Brand <?php echo $row['author'] ?></i>,
  <b>$<?php echo $row['price'] ?></b>

  <p><?php echo $row['summary'] ?></p>

  <a href="add-to-cart.php?id=<?php echo $id ?>" class="add-to-cart">
    Add to Cart
  </a>
</div>

<div class="footer">
  &copy; <?php echo date("Y") ?>. All right reserved.
</div>
</body>
</html>