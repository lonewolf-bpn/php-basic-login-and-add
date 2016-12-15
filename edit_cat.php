<?php 
session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php ?msg=1');
}?>

<?php 

$id=$_GET['id']; ?>

<?php

			if(isset($_POST['Ubtn'])){
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
			$cdatedi= date('Y-m-d H:i:s');
			if(count($error)==0){
				

		$sql = "update tbl_category set name='$cname',rank=$crank,status=$cstatus,modified_date='$cdatedi',modified_by='$cuname' where id=$id";

	require_once "connect.php";
	$conn->query($sql);


		
				if ($conn->affected_rows ==1 ) {
					echo "Category Updated Successfully with id $id";
				} else {
					echo "Category Update failed";
				}
			}

}

?>

<?php
	$sql = "select * from tbl_category where id='$id'";

require_once "connect.php";

$res = $conn->query($sql);

$data = $res->fetch_assoc();
 ?>

	<br>
<?php 
require_once "header.php";
 ?>
 Update from here
		 <br>
		 <center><form name="cf1" method="post" action=""><br>
		 Name:<input type="text" name ="cname" value="<?php echo $data['name'] ?>">
		<?php 
		if(isset($error['cname'])){
			echo $error['cname'];
		}
		 ?><br>

		 Rank:<input type="number" name ="crank" value="<?php echo $data['rank'] ?>">
		  <?php 
		if(isset($errrank)){
			echo $errrank;
		}
		 ?>
		 <br>
		 Status:	<?php if ($data['status'] == 1) { ?>
					<input type="radio" name="cstatus" value="1" checked="">Active
					<input type="radio" name="cstatus" value="0">De-Active
				<?php } else { ?>
					<input type="radio" name="cstatus" value="1">Active
					<input type="radio" name="cstatus" value="0" checked="">De-Active

				<?php } ?><br>
				<input type="submit" name="Ubtn" value="Update Category">

	 <br>
	 <a href="logout.php">LOGOUT</a>