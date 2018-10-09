	<div id="modal-main">
		<span class="modal-dismiss" onclick="modaldismiss();">&times;</span>
		<div id="modal-signup">
			<h1 style="margin-bottom: 10px;">Sign up</h1>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
				<span class="error-span"><?php echo $error; ?></span><br>
				<label>Username:</label>&nbsp;<span></span><br>
				<input type="text" name="username" placeholder="Username" class="modal-input" title="This field is required"><br>
				<label>Email:</label><br>
				<input type="email" name="email" placeholder="Email" class="modal-input" title="This field is required"><br>
				<label>Password:</label><br>
				<input type="password" name="password" placeholder="Password" class="modal-input" title="This field is required"><br>
				<label>Confirm Password:</label><br>
				<input type="password" name="cpassword" placeholder="Confirm Password" class="modal-input" title="This field is required" style="margin-bottom: 10px;"><br>
				<input type="submit" name="signup" value="Register" class="modal-btn">
			</form>
		</div>
		<div id="modal-login">
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