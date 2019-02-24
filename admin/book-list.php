<?php
  include("confs/auth.php");
  include("confs/config.php");

  $total = mysqli_query($conn, "SELECT id FROM books");
  $total = mysqli_num_rows($total);

  # Paging
  $limit = 3;
  $start = 0;
  if(isset($_GET['start'])) {
    $start = $_GET['start'];
  }

  $next = $start + $limit; 
  $prev = $start - $limit;

  $result = mysqli_query($conn, "SELECT books.*, categories.name FROM books LEFT JOIN categories ON books.category_id = categories.id ORDER BY books.created_date DESC LIMIT $start, $limit");
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Shop List</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Shop List</h1>
<ul class="menu">
  <li><a href="book-list.php">Manage Items</a></li>
  <li><a href="cat-list.php">Manage Items Categories</a></li>
  <li><a href="orders.php">Manage Orders</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>



<ul class="list">
  <?php while($row = mysqli_fetch_assoc($result)): ?>
    <li>
      <? if(!is_dir("covers/{$row['cover']}") and file_exists("covers/{$row['cover']}")): ?>
      <img src="covers/<?php echo $row['cover'] ?>" alt="" align="right" height="140">
      <? else: ?>
      <img src="covers/no-cover.gif" alt="" align="right" height="140">
      <? endif; ?>

      <b><?php echo $row['title'] ?></b>
      <i>Brand <?php echo $row['author'] ?></i>
      <small>(in <?php echo $row['name'] ?>)</small>
      <span>MMK<?php echo $row['price'] ?></span>
      <div><?php echo $row['summary'] ?></div>

      [ <a href="book-del.php?id=<?php echo $row['id'] ?>"
      			class="del" onClick="return confirm('Are you sure?')">del</a> ]
      [ <a href="book-edit.php?id=<?php echo $row['id'] ?>">edit</a> ]
    </li>
  <?php endwhile; ?>
</ul>

<a href="book-new.php" class="new">Add Items</a>

<div class="paging">
	<? if($prev < 0): ?>
	<span>&laquo; Previous</span>
	<? else: ?>
	<a href="?start=<?= $prev ?>">&laquo; Previous</a>
	<? endif; ?>

	<? if($next >= $total): ?>
	<span>Next &raquo;</span>
	<? else: ?>
	<a href="?start=<?= $next ?>">Next &raquo;</a>
	<? endif; ?>
</div>
<br style="clear:both">

</body>
</html>
