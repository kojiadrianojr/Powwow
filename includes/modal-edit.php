	<div id="modal-main">
		<span class="modal-dismiss" onclick="modaldismiss();">&times;</span>
		<div id="cont-edit">
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data" method="post">
				<div class="divider"><label>Profile Picture:</label><br>
				<img height="100" width="100" id="blah" src="<?php echo $pic; ?>"><br>
				<input type="file" name="pic" accept="image/*" onchange="readURL(this);"></div><br>
				<div class="divider"><label>Username:</label><br>
				<input class="edit-input" type="text" disabled="true" placeholder="<?php echo $uname; ?>"></div><br>
				<div class="divider" style="margin-bottom: 10px;"><label>Bio:</label><br>
				<textarea rows="3" name="bio" cols="35" maxlength="255"><?php echo $ubio; ?></textarea></div>
				<div class="divider"><label>Email:</label><br>
				<input class="edit-input" type="text" name="uemail" value="<?php echo $uemail; ?>" placeholder="Enter your email" ></div>
				<div style="padding-top: 10px; padding-bottom: 20px;"><button title="Save" name="submit" class="edit-btn"><i class="fa fa-save fa-lg"></i></button></div>
			</form>
		</div>
	</div>
