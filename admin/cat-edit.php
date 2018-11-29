<?php require("confs/auth.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title></title>
  </head>
  <body>
      <h1>Edit Category</h1>
      <ul class="menu">
    			<li><a href="book-list.php">Manage Books</a></li>
    			<li><a href="cat-list.php">Manage Categories</a> </li>
    			<li><a href="orders.php">Manage Orders</a></li>
    			<li><a href="logout.php">Logout</a></li>
    	</ul>
      <?php
        require("confs/config.php");
        $id=$_GET['id'];
        $result=mysqli_query($conn,"SELECT * FROM categories WHERE id=$id");
        $row=mysqli_fetch_assoc($result);
       ?>
       <form action="cat-update.php" method="post">
         <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
         <div class="form-group">
           <label for="name">Name</label>
           <input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control" autofocus required id="name">
         </div>
         <div class="form-group">
           <label for="remark">Remark</label>
           <textarea name="remark" class="form-control" id="remark">
             <?php echo $row['remark']; ?>
           </textarea>
         </div>
         <input type="submit" class='btn btn-primary btn-sm' value="Edit Category">
       </form>
  </body>
</html>
