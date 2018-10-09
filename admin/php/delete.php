<?php 
include_once '../../php/config.php';

	// get value of id that sent from address bar 
$uid=$_GET['id'];
	
		// Delete data in mysql from row that has this id 
		$sql="DELETE FROM user WHERE id='$uid'";
		mysqli_query($con, $sql);
		$sql = "DELETE FROM user_account WHERE user_id = '$uid' ";
		mysqli_query($con, $sql);
		header("Location: ../user.php");
		echo '<script> alert("Deleted!"); </script>';


?>