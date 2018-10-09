<?php
	include 'include-header.php';
	if (!isset($_SESSION['userid'])) {
		header("Location: ../relog");
	}
?>
<?php
$up = 'up';
$down = 'down';
			if (isset($_POST['upvote'])) {
				
				$forid = mysqli_real_escape_string($con, $_POST['forumid']);
				$usahids = $_SESSION['userid'];
				$upsql = "INSERT INTO vote(user_id, forum_id, vote_type) VALUES ('$usahids', '$forid', '$up') ";
				$sel = "SELECT * FROM vote WHERE user_id = '$usahids' AND forum_id = '$forid' AND vote_type = '$up' ";
				$test = mysqli_query($con, $sel);
				if (mysqli_num_rows($test) > 0) {
					echo "<script>
			              alert('You have already Upvoted!');
			              window.location.href='../answer/?questionid=$forid';
			              </script>";
			        exit();
				} else {
					$sel = "SELECT * FROM vote WHERE user_id = '$usahids' AND forum_id = '$forid' AND vote_type = '$down' ";
					$test = mysqli_query($con, $sel);
					if (mysqli_num_rows($test) > 0) {
						$update = "UPDATE vote SET vote_type = '$up' WHERE user_id = '$usahids' AND forum_id = '$forid' ";
						mysqli_query($con, $update);
						echo "<script>
			              alert('Successfully Changed!');
			              window.location.href='../answer/?questionid=$forid';
			              </script>";
			        exit();
					} else {
						$inset = "INSERT INTO vote(user_id, forum_id, vote_type) VALUES('$usahids', '$forid', '$up') ";
						mysqli_query($con, $inset);
						echo "<script>
			              alert('Successfully Upvoted!');
			              window.location.href='../answer/?questionid=$forid';
			              </script>";
			              exit();
						}
				}
				
			}
			else if (isset($_POST['downvote'])) {
				
				$forid = mysqli_real_escape_string($con, $_POST['forumid']);
				$usahids = $_SESSION['userid'];
				$upsql = "INSERT INTO vote(user_id, forum_id, vote_type) VALUES ('$usahids', '$forid', '$down') ";
				$sel = "SELECT * FROM vote WHERE user_id = '$usahids' AND forum_id = '$forid' AND vote_type = '$down' ";
				$test = mysqli_query($con, $sel);
				if (mysqli_num_rows($test) > 0) {
					echo "<script>
			              alert('You have already Downvoted!');
			              window.location.href='../answer/?questionid=$forid';
			              </script>";
			        exit();
				} else {
					$sel = "SELECT * FROM vote WHERE user_id = '$usahids' AND forum_id = '$forid' AND vote_type = '$up' ";
					$test = mysqli_query($con, $sel);
					if (mysqli_num_rows($test) > 0) {
						$update = "UPDATE vote SET vote_type = '$down' WHERE user_id = '$usahids' AND forum_id = '$forid' ";
						mysqli_query($con, $update);
						echo "<script>
			              alert('Successfully Changed!');
			              window.location.href='../answer/?questionid=$forid';
			              </script>";
			        exit();
					} else {
						$inset = "INSERT INTO vote(user_id, forum_id, vote_type) VALUES('$usahids', '$forid', '$down') ";
						mysqli_query($con, $inset);
						echo "<script>
			              alert('Successfully Downvoted!');
			              window.location.href='../answer/?questionid=$forid';
			              </script>";
			              exit();
						}
				}
				
			}
?>