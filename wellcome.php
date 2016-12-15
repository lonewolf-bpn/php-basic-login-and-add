
<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php ?msg=1');
}
  ?>
Wellcome  <?php echo ucfirst($_SESSION['username']); ?> 
<?php 
require_once "header.php";
 ?>

 <br>
<a href="logout.php">LOGOUT</a>