<?php 
	include_once '../php/include-header.php';	
	if (!isset($_SESSION['userid'])) {
		header('Location: ../relog');
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php
	include '../includes/header.php';
?>
<body>
<?php
	include '../includes/navbar-session.php';
	include '../includes/container-ask.php';
	include '../includes/footer.php';
?>
<script type="text/javascript">
		openCity(event, 'Featured');
</script>
</body>
</html>