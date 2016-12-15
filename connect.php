<?php
$conn = new mysqli('localhost','root','','db_broadway');
//check for database connection error
		if($conn->connect_errno != 0){
			die("Database Connection Error");

		}
?>