<?php
	
require("confs/config.php");

$id=$_GET['id'];

mysqli_query($conn,"DELETE FROM books WHERE id=$id");

header("location:book-list.php");