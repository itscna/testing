<?php require("confs/auth.php"); ?>
<!doctype HTML>
<html lang="en">
<head>
	<title></title>
	 <meta charset="utf-8">
	 <link rel="stylesheet" href="css/bootstrap.min.css">
	 <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>

	<h1>Book Lists</h1>
	<ul class="menu">
			<li><a href="book-list.php">Manage Books</a></li>
			<li><a href="cat-list.php">Manage Categories</a> </li>
			<li><a href="orders.php">Manage Orders</a></li>
			<li><a href="logout.php">Logout</a></li>
	</ul>
	<?php
		require("confs/config.php");
		$sql="SELECT books.*,categories.name FROM books LEFT JOIN categories
			  ON books.category_id=categories.id ORDER BY books.created_date DESC";
		$result=mysqli_query($conn,$sql);
	 ?>
	 <ul class="list">
	 	<?php while($row=mysqli_fetch_assoc($result)): ?>
	 	<li>
	 		<img src="covers/<?php echo $row['cover']; ?>" align="right" height="150">

	 		<b><?=$row['title']; ?></b>
	 		<i> by <?=$row['author']; ?> </i>
	 		<small> ( in <?=$row['name']; ?>)</small>
	 		<span>$ <?=$row['price']; ?></span>
	 		<div><?=$row['summary']; ?></div>
	 		[<a href="book-del.php?id=<?=$row['id']; ?>" class="del" onClick="return confirm('Are you Sure')">Del</a>]
	 		[<a href="book-edit.php?id=<?=$row['id']; ?>">Edit</a>]
	 	</li>
	 <?php endwhile; ?>
	 </ul>
	 <a href="book-new.php" class="btn btn-info" id="new">Add New Book</a>

</body>
</html>
