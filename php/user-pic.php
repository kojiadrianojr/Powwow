<?php
	//This code tells if the user has a profile pic
	$userd = $_SESSION['userid'];
	$quer = "SELECT user_acc_pic FROM user_account WHERE user_acc_id = '$userd'";
	$runn = mysqli_query($con, $quer);
	$see = mysqli_fetch_array($runn);
	if (!empty($see['user_acc_pic'])) {
		$pic = $see['user_acc_pic'];
	} else {
		$pic = '../img/no.jpg';
	}

?>