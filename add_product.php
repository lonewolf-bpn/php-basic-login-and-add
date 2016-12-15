
<?php
session_start();
if(!isset($_SESSION['uname'])){
	header('location:index.php ?msg=1');
}
//print_r($_SESSION);
  ?>
ADD PRODUCT

<?php 
require_once "header.php";
 ?>



 <br>
<a href="logout.php">LOGOUT</a>