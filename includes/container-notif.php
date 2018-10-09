<?php
	$uruser = $_SESSION['userid'];
	$notisql = "SELECT * FROM forum WHERE user_id = '$uruser' AND forum_active = '0' ";
	$notiquery = mysqli_query($con, $notisql);
	while ($notifetch = mysqli_fetch_array($notiquery)) {
		
		$comsql = "SELECT * FROM "
	}
?>
<div id="container">
	<div id="content">
		<div id="notificate">
			<div id="noti-header"><h4>Notifications</h4></div>
		</div>
	</div>
</div>