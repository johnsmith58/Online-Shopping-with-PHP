<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>New Category</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>New Category</h1>
<form action="cat-add.php" method="post">
  <label for="name">Category Name</label>
  <input type="text" name="name" id="name">

  <label for="remark">Remark</label>
  <textarea name="remark" id="remark"></textarea>

  <br><br>
  <input type="submit" value="Add Category">
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

