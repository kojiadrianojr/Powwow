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
		include '../includes/navbar-guest.php';
		include '../includes/container-question.php';
		include '../includes/footer.php';
	} else {
		include '../includes/navbar-session.php';
		include '../includes/container-question.php';
		include '../includes/footer.php';
	}
?>
<script type="text/javascript">
		openCity(event, 'Featured');
</script>
</body>
</html>