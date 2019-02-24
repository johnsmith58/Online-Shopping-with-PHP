<?php
  session_start();
  include("admin/confs/config.php");
  include("search.lib.php");

  $cart = 0;
  if(isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $qty) {
      $cart += $qty;
    }
  }
  
  # Browse by Category
  if(isset($_GET['cat'])) {
	$cat_id = $_GET['cat'];
	$books = mysqli_query($conn, "SELECT * FROM books WHERE category_id = $cat_id");

  } else {
    $books = mysqli_query($conn, "SELECT * FROM books");
  }
  
  # Search Result
  if(isset($_GET['q'])) {
  	$books = search_perform($_GET['q'], "books", "title");
  }

  $cats = mysqli_query($conn, "SELECT * FROM categories");
?>
<!doctype html>
<html>
<head>
  <title>Book Store</title>
  <link rel="stylesheet" href="css/new.css">

  <script src="js/app.js"></script>
</head>
<body>
  <h1 id="title">Online Shopping</h1>

  <div class="info">
    <a href="view-cart.php">
      (<?php echo $cart ?>) shop in your cart
    </a>
  </div>

  <div class="sidebar">
    <ul class="cats">
      <li>
        <b><a href="index.php">All Category</a></b>
      </li>
      <?php while($row = mysqli_fetch_assoc($cats)): ?>
      <li>
        <a href="index.php?cat=<?php echo $row['id'] ?>">
          <?php echo $row['name'] ?>
        </a>
      </li>
      <?php endwhile; ?>
      
      <form action="index.php" method="get" class="search">
      	<input type="text" name="q" placeholder="Search by title">
      	<input type="submit" value=" ">
      </form>
    </ul>
  </div>

  <div class="main">
    <ul class="books">
      <?php while($row = mysqli_fetch_assoc($books)): ?>
      <li>
      	<? if(!is_dir("admin/covers/{$row['cover']}") and file_exists("admin/covers/{$row['cover']}")): ?>
		<img src="admin/covers/<?php echo $row['cover'] ?>" alt="" height="150">
		<? else: ?>
		<img src="admin/covers/no-cover.gif" alt="" height="150">
		<? endif; ?>
		
        <b>
          <a href="book-detail.php?id=<?php echo $row['id'] ?>">
            <?php echo $row['title'] ?>
          </a>
        </b>

        <i>MMK<?php echo $row['price'] ?></i>

        <a href="add-to-cart.php?id=<?php echo $row['id'] ?>" class="add-to-cart">
          Add to Cart
        </a>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>

  <div class="footer">
    &copy; <?php echo date("Y") ?>. All right reserved.
  </div>
</body>
</html>

