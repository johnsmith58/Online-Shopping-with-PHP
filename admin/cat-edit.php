<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Edit Category</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Edit Category</h1>

<?php
  include("confs/config.php");

  $id = $_GET['id'];
  $result = mysqli_query($conn, "SELECT * FROM categories WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
?>

<form action="cat-update.php" method="post">
  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

  <label for="name">Category Name</label>
  <input type="text" name="name" id="name" value="<?php echo $row['name'] ?>">

  <label for="remark">Remark</label>
  <textarea name="remark" id="remark"><?php echo $row['remark'] ?></textarea>

  <br><br>
  <input type="submit" value="Update Category">
</form>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script>
$(function() {
	$("form").validate({
		rules: {
			"name": "required"
		},
		messages: {
			"name": "Please provide category name"
		}
	});
});
</script>
</body>
</html>

