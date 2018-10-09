<?php
	include_once '../php/user-pic.php'; //For checking profile pic
?>
<?php
	$noticesql = "SELECT COUNT(comment_id) AS comments FROM comment WHERE   "
?>
	<div id="navbar">
		<h1 title="Home" onclick="window.location.href='../index';"><img src="../img/logo.png">Powwow</h1>
		<ul>
			<li><a href="../index">Home</a></li>
			<li><a href="../forum">Forums</a></li>
			<li><a href="../question">Questions</a></li>
			<li><a href="../notification"><i class="fa fa-globe fa-lg" title="Notification" style="font-size: 25px;"><span class='noti'>22</span></i></a></li>
			<li><a href="../users?userid=<?php echo $_SESSION['userid']; ?>"><img title="<?php echo $_SESSION['username']; ?>" id="how" class="user-pic" height="200" width="200" src="<?php echo $pic; ?>" ></a></li>
			<li><a href="../php/logout.php"><i class="fa fa-gear fa-lg" title="Logout" style="font-size: 25px;"></i></a></li>
		</ul>
	</div>