<?php 
session_start();

setcookie('username','',time()-1); 
session_destroy();
header('location:index.php');
 ?>