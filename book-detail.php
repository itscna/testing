<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Book Store</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<h1>Book Detail</h1>
	<?php
		require("admin/confs/config.php");
		$id=$_GET['id'];
		$book=mysqli_query($conn,"SELECT * FROM books WHERE id=$id");
		$row=mysqli_fetch_assoc($book); 
	 ?>
	 <div class="detail">
	 <a href="index.php" class="btn btn-info btn-sm" id="back">Go Back</a><br>
	 <img src="admin/covers/<?php echo $row['cover']; ?>" height="200">
	 <h4><?php echo $row['title']; ?></h4>
	 <b>by <?php echo $row['author']; ?></b>
	 <i> $<?php echo $row['price']; ?></i><br>
	 <span><?php  echo $row['summary']; ?></span><br>
	 <a href="add-to-cart.php?id=<?=$row['id']; ?>" class="btn btn-primary">Add To Cart</a>
	</div>
	<div class="footer">
			&copy; <?php echo date('Y') ?> All rights reserved.
	</div>
</body>
</html>
