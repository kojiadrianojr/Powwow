						<h2><?php echo $Cmsg; ?></h2>

						<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
							<p>
								<label for="title">Title <small>Alpha-numeric characters only.</small> </label>
								<input type="text" name="cat-title" />
							</p>
							<p>
								<label for="cat-desc">Post</label>
								<textarea name="cat-desc"></textarea>
							</p>
							<p>
								<input type="submit" value="post" name="post-cat"/>
							</p>
						</form>