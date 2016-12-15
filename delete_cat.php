<?php 

$id =$_GET['id'];
$sql = "delete from tbl_category where id ='$id'";
require_once "connect.php";
if($conn->query($sql)){
	 header('location:view_category.php?mgs=3');
	}else{
	 header('location:view_category.php?mgs=4');
	}
 
 ?>