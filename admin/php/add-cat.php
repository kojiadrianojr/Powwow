<?php
		$Cmsg = 'Add Category';
		if (isset($_POST['post-cat'])) {
			$Ctitle = mysqli_real_escape_string($con, $_POST['cat-title']);
			$Cdes = $_POST['cat-desc'];
			if (!empty($Ctitle) && !empty($Cdes)) {
				$post = "INSERT INTO category(category_name, category_des) VALUES ('$Ctitle','$Cdes') ";
				mysqli_query($con, $post);
				header("Location: dashboard.php");
			} else {
				$Cmsg = '<span class="error-span">You must fillup every form</span>';
			}
		}
?>