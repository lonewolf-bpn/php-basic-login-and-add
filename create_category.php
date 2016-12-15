
<?php 
session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php ?msg=1');
}


if(isset($_POST['save'])){
	$error =array();
	if(isset($_POST['cname'])&& !empty($_POST['cname'])){
$cname =$_POST['cname'];
}else{
	$error['cname'] ='Please enter you name';
}
if(isset($_POST['crank'])&& !empty($_POST['crank'])){
$crank =$_POST['crank'];
}else{
	$error['crank'] ='Please enter you rank';
}
$cstatus =$_POST['cstatus'];
$cuname=$_SESSION['username'];
$cdateadd= date('Y-m-d H:i:s');
if(count($error)==0){
	

$sql ="insert into tbl_category(name,rank,status,created_by,created_date) values ('$cname',$crank,$cstatus,'$cuname','$cdateadd')";
	require_once "connect.php";
	 $conn->query($sql);

	 if ($conn->affected_rows == 1 && $conn->insert_id != 0) {
					echo "Category Created Successfully with id  $conn->insert_id ";
				} else {
					echo "Category Insertion failed";
				}

}

}

?>
<br>
create category here
<?php 
require_once "header.php";
 ?>
 <center><form name="cf1" method="post" action=""><br>
 Name:<input type="text" name ="cname">
<?php 
if(isset($error['cname'])){
	echo $error['cname'];
}
 ?><br>

 Rank:<input type="number" name ="crank" >
  <?php 
if(isset($errrank)){
	echo $errrank;
}
 ?>
 <br>

 <input type ="radio" name="cstatus" value ="1" >Active
 <input type ="radio" name="cstatus" value ="0" checked=""> Deactive
  <br>
 
 <input type="submit" name ="save" value="Save">
 </form></center>


 <br>
 <a href="logout.php">LOGOUT</a>