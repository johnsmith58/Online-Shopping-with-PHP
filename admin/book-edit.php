<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Edit Items</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
  include("confs/config.php");

  $id = $_GET['id'];
  $result = mysqli_query($conn, "SELECT * FROM books WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
?>

<h1>Edit Item</h1>
<form action="book-update.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

  <label for="title">Items Name</label>
  <input type="text" name="title" id="title" value="<?php echo $row['title'] ?>">

  <label for="author">Brand Name</label>
  <input type="text" name="author" id="author" value="<?php echo $row['author'] ?>">

  <label for="summary">Item About</label>
  <textarea name="summary" id="summary"><?php echo $row['summary'] ?></textarea>

  <label for="price">Price</label>
  <input type="text" name="price" id="price" value="<?php echo $row['price'] ?>">

  <label for="categories">Category</label>
  <select name="category_id" id="categories">
    <option value="">-- Choose --</option>
    <?php
      $categories = mysqli_query($conn, "SELECT id, name FROM categories");
      while($cat = mysqli_fetch_assoc($categories)):
    ?>
    <option value="<?php echo $cat['id'] ?>"
          <?php if($cat['id'] == $row['category_id']) echo "selected" ?> >
      <?php echo $cat['name'] ?>
    </option>
    <? endwhile; ?>
  </select>

  <br><br>
  
  <? if(!is_dir("covers/{$row['cover']}") and file_exists("covers/{$row['cover']}")): ?>
  <img src="covers/<?php echo $row['cover'] ?>" alt="" height="150">
  <? else: ?>
  <img src="covers/no-cover.gif" alt="" height="150">
  <? endif; ?>
  
  <label for="cover">Change Cover</label>
  <input type="file" name="cover" id="cover">

  <br><br>
  <input type="submit" value="Update Item">
  <a href="book-list.php">Back</a>
</form>

<script src="../js/jquery.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script>
$(function() {
	$("form").validate({
		rules: {
			"title": "required",
			"author": "required",
			"category_id": "required",
			"price": "required"
		},
		messages: {
			"title": "Please provide book title",
			"author": "Please provide author name",
			"category_id": "Please choose a category",
			"price": "Please provide book price"
		}
	});
});
</script>

</body>
</html>
