<?php 
	
require("confs/config.php");
$title=$_POST['title'];
$author=$_POST['author'];
$summary=$_POST['summary'];
$price=$_POST['price'];
$cover=$_FILES['covers']['name'];
$tmp=$_FILES['covers']['tmp_name'];

$category_id=$_POST['category_id'];

if($cover)
{
	move_uploaded_file($tmp,"covers/$cover");
}

$sql="INSERT INTO books(title,author,summary,price,cover,category_id,created_date,modified_date)
	VALUES('$title','$author','$summary','$price','$cover','$category_id',now(),now())";

mysqli_query($conn,$sql);

header("location:book-list.php");