<?php
	session_start();
	require("admin/confs/config.php");

	$cart=0;
	if(isset($_SESSION['cart'])){
		foreach($_SESSION['cart'] as $qty){
			$cart+=$qty;
		}
	} 
	if(isset($_GET['cat'])){
		$cat_id=$_GET['cat'];

		$books=mysqli_query($conn,"SELECT * FROM books WHERE category_id=$cat_id");
	}
	else{
		$books=mysqli_query($conn,"SELECT * FROM books");
	}

	$categories=mysqli_query($conn,"SELECT * FROM categories");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Book Store</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
  
  	<h1>Book Store</h1>
  	<div class="info">
  		<a href="view-cart.php">(<?php echo $cart; ?> book in your cart )</a>
  	</div>
    <div class="wrapper">
  	<div class="sidebar">
  		<ul class="cats">
  			<li><a href="index.php">All books</a></li>
  			<?php while($row=mysqli_fetch_assoc($categories)): ?>
  			<li>
  				<a href="index.php?cat=<?php echo $row['id']; ?>">
  					<?php echo $row['name']; ?>
  				</a>
  			</li>
  		<?php endwhile; ?>
  		</ul>
  	</div>
  	<div class="main">
  		<ul class="books">
  			<?php while($row=mysqli_fetch_assoc($books)): ?>
  			<li>
  				<img src="admin/covers/<?php echo $row['cover']; ?>" height="150">
  				<b>
  					<a href="book-detail.php?id=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a>
  				</b>
  				<i>$<?php echo $row['price']; ?></i>
  				<a href="add-to-cart.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Add To Cart</a>
  			</li>
  		<?php endwhile; ?>
  		</ul>
  	</div>
  </div>
  </div>
  	<div class="footer">
  		&copy; <?php echo date('Y') ?> All rights reserved.
  	</div>

  </body>
</html>