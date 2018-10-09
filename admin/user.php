<?php
	include_once 'php/admin-header.php';	//Connects to database
	if (!isset($_SESSION['userid'])) {
		header('Location: admin-login.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<title>Admin Pannel - Powwow</title>
		<link rel="stylesheet" href="css/960.css" type="text/css" media="screen" charset="utf-8" />
		<!--<link rel="stylesheet" href="css/fluid.css" type="text/css" media="screen" charset="utf-8" />-->
		<link rel="stylesheet" href="css/template.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="css/colour.css" type="text/css" media="screen" charset="utf-8" />
	


	</head>
	<body>
		
					<h1 id="head">Hello <?php echo $_SESSION['username']; ?></h1>
		
		<ul id="navigation">
			<li><a href="dashboard.php">Overview</a></li>
			<li><span class="active">Users</span></li>
			<li><a href="php/admin-logout.php">Logout<i class="fa fa-gear fa-lg" title="Logout" style="font-size: 25px;"></i></a></li>
		</ul>
		
			<div id="content" class="container_16 clearfix">
				
				<div class="grid_16">
					<table>
						<thead>
							<tr>
								<th>User ID</th>
								<th>Email Account</th>
								<th>Registered </th>
								<th colspan="2" width="10%">Actions</th>
							</tr>
						</thead>
						<tfoot>
							<!--  PAGE NATION -->
						</tfoot>
						<tbody>
							<tr>

								<?php 

								$connection = mysql_connect('localhost', 'root', ''); 
								mysql_select_db('powwow');

								$display = mysql_query("SELECT * FROM user_account");


								while ($row = mysql_fetch_array($display)) 
									
								{
									$id = $row['user_acc_id'];
									$umail = $row['user_acc_email'];
									$udate = $row['user_acc_date'];
								?>
									<tr> 
										<td><?php echo " ".$id.""; ?></td>
										<td><?php echo " ".$umail." ";?></td>
										<td><?php echo " ".$udate." ";?></td> 
										<td><a href="<?php echo "php/delete.php?id=$id"; ?>" class="delete">Delete</a></td>
									</tr>	
								<?php  
								}
								?>
									
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		
		<div id="foot">
					Alrights Reserve 2017 - Powwow Admin Page
				
		</div>
	</body>
</html>