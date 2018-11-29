<?php require("confs/auth.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  </head>
  <body>
      <h1>New Category</h1>
      <ul class="menu">
    			<li><a href="book-list.php">Manage Books</a></li>
    			<li><a href="cat-list.php">Manage Categories</a> </li>
    			<li><a href="orders.php">Manage Orders</a></li>
    			<li><a href="logout.php">Logout</a></li>
    	</ul>
      <form action="cat-add.php" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name" class="form-control" autofocus required>
        </div>
        <div class="form-group">
          <label for="remark">Remark</label>
          <textarea name="remark" id="remark" class="form-control"></textarea>
        </div>
        <input type="submit" class="btn btn-primary btn-sm" value="Add Category">
      </form>
  </body>
</html>
