					<h2><?php echo $msg; ?></h2>
						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							<p>
								<label for="title">Title <small>Alpha-numeric characters only.</small> </label>
								<input type="text" name="title" />
							</p>
							<p>
								<label for="post">Post</label>
								<textarea name="post"></textarea>
							</p>
							<p>
								<input type="submit" value="post" name="post-sub" />
							</p>
						</form>