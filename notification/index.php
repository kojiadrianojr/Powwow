<?php 
	include_once '../php/include-header.php';
	include_once '../php/user-pic.php';	
	if (!isset($_SESSION['userid'])) {
		header('Location: ../relog');
	}
?>
<?php 
	include_once '../php/include-header.php';	//Connects to database
?>
<!DOCTYPE html>
<html lang="en">
<?php
	include '../includes/header.php';
?>
<body>
<?php
	include '../includes/navbar-session.php';
	include '../includes/container-notif.php';
	include '../includes/footer.php';
?>
<script type="text/javascript">
		openCity(event, 'Featured');
</script>
</body>
</html>