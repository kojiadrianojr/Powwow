<?php
	//Signup PHP Code
	$error = '';
	$set = 0;
	//for error checking
	if (isset($_POST['signup'])) {
		$username = mysqli_real_escape_string($con, strtolower($_POST['username']));
		$email = mysqli_real_escape_string($con, $_POST['email']);
		$password = mysqli_real_escape_string($con, $_POST['password']);
		$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	if(!empty($username) && !empty($email) && !empty($password) && !empty($cpassword))
	{
		if($password == $cpassword)
		{
			//check if the username already exist
			$sql = "SELECT user_id FROM user WHERE username='$username'";
			$check_info = mysqli_fetch_array(mysqli_query($con, $sql));
			if(!$check_info)
			{
				$password = md5($password.".".$username);
				$sqlz = "INSERT INTO user(username, password) VALUES ('$username', '$password')";
				$insert = mysqli_query($con, $sqlz);
				if($insert)
				{
					//get other info and set in session for easy access of main info needed for the user when loged in
					$sql = "SELECT user_id FROM user WHERE username='$username'";
					$select = mysqli_query($con, $sql);
					$check_info2 = mysqli_fetch_array($select);
					$userid = $check_info2['user_id'];
					$sqli = "INSERT INTO user_account(user_acc_email, user_id) VALUES ('$email', '$userid')";
					$inserts = mysqli_query($con, $sqli);
					if($check_info2)
					{
						$upload_dir = "../profiles/$username/";
						mkdir($upload_dir);
						$_SESSION['username'] = $username;
						$_SESSION['userid'] = $check_info2['user_id'];
						echo '<script>
							alert("Successfuly Saved");
							window.location.href="../index";
							</script>';//successfuly saved
					}
				}
				else
				{
					$error = 'Error in saving!';
					$set = 1;
				}
			}
			else
			{
				$error = 'Username already exist';//username already exist
				$set = 1;
			}
		}else
		{
			$error = 'Confirming passwords do not match';//Confirming password did not match.
			$set = 1;
		}
	}
		else
		{
			$error = 'Please fillup the form properly';//Please fillup the form properly
			$set = 1;
		}
	}
 ?>