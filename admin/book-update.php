<?php

require('confs/config.php');
$id=$_POST['id'];
$title=$_POST['title'];
$author=$_POST['author'];
$summary=$_POST['summary'];
$price=$_POST['price'];
$cover=$_FILES['cover']['name'];
$tmp=$_FILES['cover']['tmp_name'];

$category_id=$_POST['category'];

if($cover)
{
  move_uploaded_file($tmp,"covers/$cover");
  $sql="UPDATE books SET title='$title',author='$author',summary='$summary',price='$price',
        cover='$cover',category_id='$category_id',modified_date=now() WHERE id=$id";
}
else {
  $sql="UPDATE books SET title='$title',author='$author',summary='$summary',price='$price',
        category_id='$category_id',modified_date=now() WHERE id=$id";
}
mysqli_query($conn,$sql);

header("location:book-list.php");
