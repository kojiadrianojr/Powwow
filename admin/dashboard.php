	<?php
	include_once 'php/admin-header.php';	//Connects to database
	if (!isset($_SESSION['userid'])) {
		header('Location: admin-login.php');
	}
?>

	<?php
	 	include 'php/quick-post.php';
	?>

	<?php
		include 'php/add-cat.php';
	?>

<!DOCTYPE html >
<html>
	<?php
		include 'head/dash-head.php';
	?>
<body>

		<h1 id="head">Hello <?php echo $_SESSION['username']; ?>!</h1>
		
		<ul id="navigation">
			<li><span class="active">Overview</span></li>
			<li><a href="user.php">Users</a></li>
			<li><a href="php/admin-logout.php">Logout<i class="fa fa-gear fa-lg" title="Logout" style="font-size: 25px;"></i></a></li>
		</ul>

			<div id="content" class="container_16 clearfix">
				<div class="grid_5">
					<div class="box">
						<?php
							include 'box/time-box.php';
						?>
					</div>
					<div class="box">

						<?php
							include 'box/add-cat.php';
						?>
						
					</div>
				</div>
				<div class="grid_6">
					<?php
					include 'box/glance-box.php';
					  ?>
				</div>
				<div class="grid_5">
					<div class="box">

						<?php
						include 'box/post-box.php';
						?>
		
					</div>
				</div>
			</div>
		<div id="foot">
			<div class="container_16 clearfix">
				<div class="grid_16">
					<span>2017 All Rights Reserve - Powwow Admin Page</span>
				</div>
			</div>
		</div>
	</body>
</html>