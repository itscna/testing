<?php require("confs/auth.php"); ?>
<!doctype HTML>
<html lang="en">
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
		<h1>Edit Book</h1>
		<ul class="menu">
				<li><a href="book-list.php">Manage Books</a></li>
				<li><a href="cat-list.php">Manage Categories</a> </li>
				<li><a href="orders.php">Manage Orders</a></li>
				<li><a href="logout.php">Logout</a></li>
		</ul>
		<?php
			require('confs/config.php');
			$id=$_GET['id'];
			$sql="SELECT * FROM books WHERE id=$id";
			$result=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc($result);
		 ?>
		 <form action="book-update.php" method="post" enctype="multipart/form-data">
		 	<input type='hidden' name="id" value="<?=$row['id']; ?>">
		 <div class="form-group">
		 	<label for="title">Title</label>
		 	<input type="text" name="title" id="title" class="form-control" value="<?=$row['title']; ?>">
		 </div>
		 <div class="form-group">
		 	<label for="author">Author</label>
		 	<input type="text" name="author" id="author" class="form-control" value="<?=$row['author'] ?>">
		 </div>
		 <div class="form-group">
		 	<label for="summary">Summary</label>
		 	<textarea class="form-control" name="summary" id="summary">
		 		<?=$row['summary']; ?>
		 	</textarea>
		 </div>
		 <div class="form-group">
		 	<label for="price">Price</label>
		 	<input type="text" name="price" id="price" class="form-control" value="<?=$row['price']; ?>">
		 </div>
		 <img src="covers/<?=$row['cover']; ?>" height="150"><br>
		 <div class="custom-file">
		 	<input type="file" name="cover" class="custom-file-input" id="cover">
		 	<label for="cover" class="custom-file-label">Edit Cover</label>
		 </div>
		 <?php
		 	$sql="SELECT * FROM categories";
		 	$result=mysqli_query($conn,$sql);
		  ?>
		  <div>
		  	<label for="categories">Edit Category</label>
		  	<select class="custom-select" id="categories" name="category">
		  	<?php while($cats=mysqli_fetch_assoc($result)): ?>
		  		<option value="<?=$cats['id']; ?> ">
		  			<?php if($cats['id']==$row['category_id']) echo "SELECTED" ?>
		  			<?php echo $cats['name']; ?>
		  		</option>
		  	<?php endwhile; ?>
		  	</select>
		  </div>
		  <input type="submit" class="btn btn-success" value="Edit">
		 </form>
		 <a href="book-list.php">Back</a>

</body>
</html>
