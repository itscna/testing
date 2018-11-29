<?php
	session_start();
	require("admin/confs/config.php");

	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];

	$sql="INSERT INTO orders(name,email,phone,address,created_date,modified_date,status)
			VALUES('$name','$email','$phone','$address',now(),now(),0)";

	mysqli_query($conn,$sql);

	$order_id=mysqli_insert_id($conn);

	foreach($_SESSION['cart'] as $id=>$qty){
		mysqli_query($conn,"INSERT INTO order_items(book_id,order_id,qty)
			VALUES($id,$order_id,$qty)");
	}

	unset($_SESSION['cart']);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Order Submitted</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<h1>Order Submit</h1>
	<div class="msg">
		Your orders have been submitted successfully.We'll deliver the items soon.
		<a href="index.php">Go Book Store Home</a>
	</div>
	<div class="footer">
		&copy; <?php echo date('Y') ?> All rights reserved.
	</div>
</body>
</html>