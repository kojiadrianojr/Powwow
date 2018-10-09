<?php
		$msg = 'Quick Post';
		if (isset($_POST['post-sub'])) {
			$title = mysqli_real_escape_string($con, $_POST['title']);
			$des = $_POST['post'];
			$user = $_SESSION['username'];
			if (!empty($title) && !empty($des)) {
				$post = "INSERT INTO admin_post(post_title, post_description,  admin_name) VALUES ('$title','$des', '$user') ";
				mysqli_query($con, $post);
				header("Location: dashboard.php");
			} else {
				$msg = '<span class="error-span">You must fillup every form</span>';
			}
		}
	?>