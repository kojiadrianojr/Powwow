<?php
	include_once 'include-header.php';

	if (isset($_POST['ansah'])) {
		$ansah = mysqli_real_escape_string($con, $_POST['editor']);
		$fid = mysqli_real_escape_string($con, $_GET['fid']);
		$uid = $_SESSION['userid'];
		$answersql = "INSERT INTO comment(comment_value, forum_id, user_id) VALUES ('$ansah','$fid','$uid') ";
		mysqli_query($con, $answersql);
		echo "<script>
              alert('Forum Answered!');
              window.location.href='../answer/?questionid=$fid';
              </script>";
	}

?>