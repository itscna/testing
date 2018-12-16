<?php
	session_start();
	if(!isset($_SESSION['cart'])){
		header("location:index.php");
		exit();
	}

	require("admin/confs/config.php");
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Shopping Card</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
		<h1>Shopping cart</h1>
	<div class="wrapper">
		<div class="sidebar">
			<ul class="cats">
				<li><a href="index.php">Continue Shopping</a></li>
				<li><a href="clear-cart.php">Clear Cart</a></li>
			</ul>
		</div>
		<div class="main">
			<table class="table table-striped table-bordered">
				<tr>
					<th>Book Title</th>
					<th>Quantity</th>
					<th>Unit Price</th>
					<th>Price</th>
				</tr>
				<?php
					$total=0;
					foreach($_SESSION['cart'] as $id=>$qty):
					$result=mysqli_query($conn,"SELECT title,price FROM books WHERE id=$id");
					$row=mysqli_fetch_assoc($result);
					$total+=$row['price']*$qty;
				 ?>
				 <tr>
				 	<td><?php echo $row['title'] ?></td>
				 	<td><?php echo $qty; ?></td>
				 	<td><?php echo $row['price'] ?></td>
				 	<td><?php echo $qty*$row['price'] ?></td>
				 </tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="3" align="center">Total</td>
					<td><?php echo $total; ?></td>
				</tr>
			</table>
			<h5>Order Now</h5><hr>
			<form action="submit-order.php" method="post">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="nvame" class="form-control" id="name">
				</div>
				<div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" class="form-control" id="email">
				</div>
				<div class="form-group">
					<label for="phone">Phone</label>
					<input type="text" name="phone" class="form-control" id="phone">
				</div>
				<div class="form-group">
					<label for="address">Address</label>
					<textarea name="address" class="form-control" id="address"></textarea>
				</div>
				<br>
				<input type="submit" value="Submit Order" class="btn btn-success"><br>
				<a href="index.php">Conuinue Shopping</a>
			</form>
		</div>
	</div>
	<div class="footer">
			&copy; <?php echo date('Y') ?> All rights reserved.
	</div>
</body>
</html>
