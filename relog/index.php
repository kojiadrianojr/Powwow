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
	if (!isset($_SESSION['userid'])) {
		include '../includes/modal.php';
		include '../includes/navbar-login.php';
		include '../includes/container-login.php';
		include '../includes/footer.php';
	} else {
		header('Location: ../index');
	}
?>
<script type="text/javascript">
		openCity(event, 'Featured');
</script>
</body>
</html>