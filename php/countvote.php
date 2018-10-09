<?php
	$up = 'up';
	$down = 'down';
	$upsql = "SELECT COUNT(vote_id) AS upvotees FROM vote WHERE vote_type = '$up' ";
	$upquery = mysqli_query($con, $upsql);
	$upval = mysqli_fetch_array($upquery);
	$upcount = $upval['upvotees'];

	$downsql = "SELECT COUNT(vote_id) AS downvotees FROM vote WHERE vote_type = '$down' ";
	$downquery = mysqli_query($con, $downsql);
	$downval = mysqli_fetch_array($downquery);
	$downcount = $downval['downvotees'];

	$thevalue = $upcount-$downcount;

?>