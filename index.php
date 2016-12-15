<?php

if(isset($_COOKIE['username'])){
	session_start();
	$_SESSION['username']= $_COOKIE['username'];
	header('location:wellcome.php');
}

	if (isset($_POST['sbtn'])) {
		if(isset($_POST['uname']) && !empty($_POST['uname'])){
     	$username = $_POST['uname'];

		echo'<br>';
		
	}else{
	$erroruname ="enter username";
	}

	if(isset($_POST['upass']) && !empty($_POST['upass'])){
   		$password = $_POST['upass'];

		echo'<br>';	
	}else {
	 $errorupass ="enter password";
	}

   if(isset($username) && isset($password)){
  
      require_once "connect.php";    

    $sql ="select *from tbl_user where username='$username' and password='$password' and status='1'";
  	 $res =$conn->query($sql);

  	 if ($res->num_rows ==1){
  	 	
     session_start();
 	$_SESSION['username']= $username;

 	if(isset($_POST['rlogin'])){
 		setcookie('username',$username,time() + (7*24*60*60) );
 	      }  
    header('location:wellcome.php');

  	 }else{ 
  	 	echo 'login failed';
  	 }
		
}
}
?>





<!DOCTYPE html>
<html>
<head>
	<title>form validation</title>

</head>
<body>
 <center><div class="mg">
	<?php 
	if(isset($_GET['msg']) && $_GET['msg']==1){
		echo 'You have to login first';
	 
	}?>
		<div></center>

		<style type="text/css">
		 	.mg{
		 		color:red;
		 	}
 	
 
		 </style>
	<form action="" method="post">
		<center>
		<h2> login here</h2>
		Name: <input type ="text" name="uname">
		<?php
		if(isset($erroruname)){
		echo $erroruname ;
		}
		?>

		<br>
		Password:<input type ="password" name="upass"><br>
		 
		 <?php
		if(isset($errorupass)){
			echo $errorupass;
		}
		?>
		<br><input type="checkbox" name="rlogin" value="Remember" > Remember me

		<br>
		<input type ="submit" name="sbtn"><br>
	</form></center>
</body>
</html>