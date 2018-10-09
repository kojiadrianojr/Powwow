 <?php
 	//Login PHP code
 	$loger = '';
 	if (isset($_POST['signin'])) {
 		$susername = mysqli_real_escape_string($con, strtolower($_POST['susername']));
 		$spassword = mysqli_real_escape_string($con, $_POST['spassword']);
 		if (!empty($susername) && !empty($spassword)) {
 			$spassword = md5($spassword.".".$susername);
 			$sqla = "SELECT * FROM user WHERE username = '$susername' AND password = '$spassword'";
 			$run = mysqli_query($con, $sqla);
 			$check = mysqli_fetch_array($run);
 			if ($check) {
 				$_SESSION['username'] = $susername;
 				$_SESSION['userid'] = $check['user_id'];
 				echo '<script>
							alert("Logged in!");
							window.location.href="../index";
					</script>';//successfuly saved
 			} else {
					$loger = 'Username or passwords do not match';
					header("Location: ../relog?log='$loger'");
 			}
 		} else {
 			$loger = 'Please fillup the form properly';
 			header("Location: ../relog?log='$loger'");
 		}
 	}
 ?>