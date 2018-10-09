<?php 
	include_once '../php/include-header.php';
	include_once '../php/user-pic.php';	
	if (!isset($_SESSION['userid'])) {
		header('Location: ../relog');
	}
	$wow ='';
?>
<?php
	if (isset($_GET['userid'])) {
		$user_id = mysqli_real_escape_string($con, $_GET['userid']);
		$test = $_SESSION['userid'];
		if ($user_id == $test) {
			$wow = '<i onclick="openedit();" title="Edit your info" class="fa fa-ellipsis-h fa-lg"></i>';
		}
		$chk = "SELECT user_acc_id FROM user_account WHERE user_acc_id = '$user_id'";
		$chkq = mysqli_query($con, $chk);
		$chke = mysqli_num_rows($chkq);
		if ($chke == 0) {
			$user_id = $_SESSION['userid'];
		}
		$user_select = "SELECT * FROM user, user_account WHERE user.user_id = '$user_id' AND user_account.user_id = '$user_id'";
		$user_check = mysqli_query($con, $user_select);
		$user_row = mysqli_fetch_array($user_check);
		$uname = $user_row['username'];
		$uemail = $user_row['user_acc_email'];
		if (!empty($user_row['user_acc_pic'])) {
			$upic = $user_row['user_acc_pic'];
			} else {
				$upic = '../img/no.jpg';
				}
		if (empty($user_row['user_acc_bio'])) {
			$ubio = 'No bio';
		} else {
			$ubio = $user_row['user_acc_bio'];
		}
	} else {
		$user_id = $_SESSION['userid'];
		$user_select = "SELECT * FROM user, user_account WHERE user.user_id = '$user_id' AND user_account.user_id = '$user_id'";
		$user_check = mysqli_query($con, $user_select);
		$user_row = mysqli_fetch_array($user_check);
		$uname = $user_row['username'];
		$uemail = $user_row['user_acc_email'];
		if (!empty($user_row['user_acc_pic'])) {
			$upic = $user_row['user_acc_pic'];
			} else {
				$upic = '../img/no.jpg';
				}
		if (empty($user_row['user_acc_bio'])) {
			$ubio = 'No bio';
		} else {
			$ubio = $user_row['user_acc_bio'];
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php
	include '../includes/header.php';
?>
<body>
<?php
	include '../includes/modal-edit.php';
	include '../includes/navbar-session.php';
	include '../includes/container-user.php';
	include '../includes/footer.php';
?>
<script type="text/javascript">
		openCity(event, 'Featured');
</script>
</body>
</html>