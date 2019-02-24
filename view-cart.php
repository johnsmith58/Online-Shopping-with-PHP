<?php
  session_start();
  if(!isset($_SESSION['cart'])) {
    header("location: index.php");
    exit();
  }

  include("admin/confs/config.php");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>View Cart</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>View Cart</h1>
  <div class="sidebar">
    <ul class="view-cats">
      <li><a href="index.php">&laquo; Continue Shopping</a></li>
      <li><a href="clear-cart.php" class="del">&times; Clear Cart</a></li>
    </ul>
  </div>

  <div class="main">
    <table>
      <tr>
        <th>Items</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Price</th>
      </tr>
      <?php
        $total = 0;
        foreach($_SESSION['cart'] as $id => $qty):
          $result = mysqli_query($conn, "SELECT title, price FROM books WHERE id=$id");
          $row = mysqli_fetch_assoc($result);
          $total += $row['price'] * $qty;
      ?>
      <tr>
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $qty ?></td>
        <td>$<?php echo $row['price'] ?></td>
        <td>$<?php echo $row['price'] * $qty ?></td>
      </tr>
      <?php endforeach; ?>
      <tr>
        <td colspan="3" align="right"><b>Total:</b></td>
        <td>$<?php echo $total; ?></td>
      </tr>
    </table>

    <div class="order-form">
      <h2>Order Now</h2>
      <form action="submit-order.php" method="post">
        <label for="name">Your Name</label>
        <input type="text" name="name" id="name">

        <label for="email">Email</label>
        <input type="text" name="email" id="email">

        <label for="phone">Phone</label>
        <input type="text" name="phone" id="phone">

        <label for="address">Address</label>
        <textarea name="address" id="address"></textarea>

        <br><br>
        <input type="submit" value="Submit Order">
        <a href="index.php">Continue Shopping</a>
      </form>
    </div>
  </div>

  <div class="footer">
    &copy; <?php echo date("Y") ?>. All right reserved.
  </div>
  
  <script src="js/jquery.js"></script>
  <script src="js/jquery.validate.min.js"></script>
  <script>
  	$(function() {
  		$("form").validate({
  			rules: {
  				"name": "required",
  				"email": {
  					required: true,
  					email: true
  				},
  				"phone": "required",
  				"address": "required"
  			},
  			messages: {
  				"name": "Please provide your name",
  				"email": {
  					required: "Please provide your email",
  					email: "Email should be a valid email address"
  				},
  				"phone": "Please provide your phone no.",
  				"address": "Please provide your address"
  			}
  		});
  	});
  </script>
  
</body>
</html>
