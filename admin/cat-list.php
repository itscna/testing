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
      <h1>Category List</h1>
      <ul class="menu">
    			<li><a href="book-list.php">Manage Books</a></li>
    			<li><a href="cat-list.php">Manage Categories</a> </li>
    			<li><a href="orders.php">Manage Orders</a></li>
    			<li><a href="logout.php">Logout</a></li>
    	</ul>
      <?php
        require("confs/config.php");
        $sql="SELECT * FROM categories";
        $result=mysqli_query($conn,$sql);
       ?>
       <ul class="list">
         <?php while($row=mysqli_fetch_assoc($result)): ?>
           <li title="<?=$row['remark']; ?>">
              <?php echo $row['name']; ?>
              [<a href="cat-del.php?id=<?=$row['id']; ?>" class="del">Del</a>]
              [<a href="cat-edit.php?id=<?=$row['id']; ?>">Edit</a>]
           </li>
         <?php endwhile; ?>
       </ul>
       <a href="cat-new.php" class="new">new Category</a>

  </body>
</html>
