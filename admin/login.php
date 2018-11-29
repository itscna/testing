<?php
session_start();
$name=$_POST['name'];
$pwd=$_POST['password'];

if($name=="admin" && $pwd=="123456")
{
  $_SESSION['auth']=true;
  header("location:book-list.php");
}
else {
  header("location:index.php");
}
