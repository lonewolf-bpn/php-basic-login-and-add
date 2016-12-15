<?php
session_start();
if(!isset($_SESSION['username'])){
	header('location:index.php ?msg=1');
}

  ?>

  
<?php 
	$sql ="select * from tbl_category";
	require_once "connect.php";
	$res =$conn->query($sql);

	$data =array();
	  if ($res->num_rows > 0) {
			while ($row = $res->fetch_assoc()) {
				array_push($data, $row);

			}
		}

if (isset($_GET['mgs']) && $_GET['mgs'] ==3) {
		echo "Category Deleted";
	} else if(isset($_GET['mgs']) && $_GET['mgs'] ==4){
		echo "category Can not delete";

	}
echo '<br>';
 ?>




<!DOCTYPE html>
<html>
<head>
	<title>view category</title>
</head>
<body>
VIEW CATEGORY
  <br>
<?php require_once "header.php"; ?>

<table border ="3">
	<thead>
		<tr>
			<th>SN</th>
			<th>ID</th>
			<th>Name</th>
			<th>Rank</th>
			<th>Status</th>
			<th>Created Date</th>
		   <th>Created By</th>
		   <th>Modified Date</th>
		    <th>Modified By</th>
		    <th> Edit/Delete</th>
		</tr>
	</thead>
	<tbody>

	<?php 
	$i=1 ;
	foreach($data as $category){
		?>
		<tr>
		<td><?php echo $i++; ?></td>
		<td><?php echo $category['id'] ?></td>
		<td><?php echo $category['name'] ?></td>
		<td><?php echo $category['rank'] ?></td>
		<td><?php echo $category['status'] ?></td>
		<td><?php echo $category['created_date'] ?></td>
		<td><?php echo $category['created_by'] ?></td>
		<td><?php echo $category['modified_date'] ?></td>
		<td><?php echo $category['modified_by'] ?></td>
		<td><a href="edit_cat.php?id=<?php echo $category['id']; ?>">edit</a>
		/<a href="delete_cat.php?id=<?php echo $category['id']; ?>"onclick="return confirm('are you sure to delete')"> delete</a></td>
		</tr>
		<?php } ?>
 
	</tbody>



</table>
<br>
<a href="logout.php">LOGOUT</a>
</body>
</html>




