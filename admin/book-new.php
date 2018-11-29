<?php require("confs/auth.php"); ?>
<!doctype HTML>
<html lang="en">
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css">
    	form label{
    		margin-top:2px;
    	}
    </style>
</head>
<body>
		<h1>New Book</h1>
		<ul class="menu">
				<li><a href="book-list.php">Manage Books</a></li>
				<li><a href="cat-list.php">Manage Categories</a> </li>
				<li><a href="orders.php">Manage Orders</a></li>
				<li><a href="logout.php">Logout</a></li>
		</ul>
		<form action="book-add.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" name="title" class="form-control" id="title" required>
			</div>
			<div class="form-group">
				<label for="author">Book Author</label>
				<input type="text" name="author" class="form-control" id="author">
			</div>
			<div class="form-group">
				<label for="summary">Summary</label>
				<textarea class="form-control" name="summary" id="summary"></textarea>
			</div>
			<div class="form-group">
				<label for="price">Price</label>
				<input type="text" class="form-control" id="price" name="price">
			</div>
			<div class="custom-file">
				<label for="covers" class="custom-file-label">Choose Cover</label>
				<input type="file" class="custom-file-input" id="covers" name="covers">
			</div>
			<br>
			<?php
				require("confs/config.php");
				$result=mysqli_query($conn,"SELECT * FROM categories");
			 ?>
			 <label for="category_id">Choose Category</label>
			 <select class='custom-select' id="category_id" name="category_id">
			 	<?php
			 		while($row=mysqli_fetch_assoc($result)):
			 	 ?>
			 	<option value="<?php echo $row['id']; ?>">
			 		<?php echo $row['name']; ?>
			 	</option>
			 <?php endwhile; ?>
			 </select>

			 <input type="submit" class="btn btn-primary btn-sm" value="Add Book">
		</form>
</body>
</html>
