<?php
	if (isset($_GET['log'])) {
		$loger = stripcslashes($_GET['log']);
	}
?>
	<div id="container">
		<div id="content">
			<div id="relog">
				<h1 style="margin-bottom: 10px;">Login</h1>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<span class="error-span"><?php echo $loger; ?></span><br>
				<label>Username:</label><br>
				<input type="text" name="susername" placeholder="Username" class="modal-input" title="This field is required"><br>
				<label>Password:</label><br>
				<input type="password" name="spassword" placeholder="Password" class="modal-input" title="This field is required" style="margin-bottom: 10px;"><br>
				<input type="submit" name="signin" value="Login" class="modal-btn">
			</form>
			</div>
		</div>
	</div>