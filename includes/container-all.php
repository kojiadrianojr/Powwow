
	<div id="container">
		<div id="wallpaper">
			<div id="message">
				<h1>Powwow social media forum</h1>
				<p>Evolving to your daily need, with almost 400,000 users.</p>
				<p>Making the internet suck less-one forum at a time.</p>
			</div>
		</div>
		<div id="content">
			<div id="incont">
				<div class="tab">
				<button class="tablinks" onclick="openCity(event, 'Featured')">Featured</button>
				<button class="tablinks" onclick="openCity(event, 'Hot')">Hot</button>
				<button class="tablinks" onclick="openCity(event, 'Questions')">New</button>
				</div>
				<div id="Featured" class="tabcontent">
				  <h3>Featured</h3>
				  <?php
						$mainsql = "SELECT forum_id, forum_name, username, forum.user_id FROM forum, user WHERE forum.user_id = user.user_id ORDER by forum_date DESC LIMIT 10";
						$main_q = mysqli_query($con, $mainsql);
						while ($main = mysqli_fetch_array($main_q)) {
							$fids = $main['forum_id'];
							$title = $main['forum_name'];
							$fuser = $main['username'];
							$fuid = $main['user_id'];
							echo "
								<h3><a href='../answer/?questionid=$fids'>$title</a></h3>
								<p>Asked by: <a href='../users/?userid=$fuid'>$fuser</a></p>
							";
						}
					?>
				</div>

				<div id="Hot" class="tabcontent">
				  <h3>Hot</h3>
				  <?php
						$mainsql = "SELECT forum_id, forum_name, username FROM forum, user WHERE forum.user_id = user.user_id ORDER by forum_views DESC LIMIT 10";
						$main_q = mysqli_query($con, $mainsql);
						while ($main = mysqli_fetch_array($main_q)) {
							$fids = $main['forum_id'];
							$title = $main['forum_name'];
							$fuser = $main['username'];
							echo "
								<h3><a href='../answer/?questionid=$fids'>$title</a></h3>
								<p>Asked by: <a href='../users/?userid=$fuid'>$fuser</a></p>
							";
						}
					?> 
				</div>

				<div id="Questions" class="tabcontent">
				  <h3>New</h3>
				  <?php
						$mainsql = "SELECT forum_id, forum_name, username FROM forum, user WHERE forum.user_id = user.user_id ORDER by forum_date ASC LIMIT 5";
						$main_q = mysqli_query($con, $mainsql);
						while ($main = mysqli_fetch_array($main_q)) {
							$fids = $main['forum_id'];
							$title = $main['forum_name'];
							$fuser = $main['username'];
							echo "
								<h3><a href='../answer/?questionid=$fids'>$title</a></h3>
								<p>Asked by: <a href='../users/?userid=$fuid'>$fuser</a></p>
							";
						}
					?>
				</div>
			</div>
			<div id="admin-news">
			<div id="news-header"><h2>Admin News</h2></div>
				<div id="news-body">
					<?php
						$qp = "SELECT * FROM admin_post ORDER by post_id DESC LIMIT 1";
						$qp_q = mysqli_query($con, $qp);
						while ($qp_f = mysqli_fetch_array($qp_q)) {
							$qpname = $qp_f['post_title'];
							$qpdes = $qp_f['post_description'];
							$qpdate = $qp_f['post_date'];
					?>
			
						<?php
							echo "
								<h5 class='p_date'>DATE: $qpdate</h5> 
								<h3 style='text-align: center;' class='adminp'>$qpname</h4>";
						?>
						<div class="p_body">
						<?php
							echo"
								<h5 class='p_des'>$qpdes</h5> ";
						?>
						</div>
					<?php		
						}
					?>
				</div>
			</div>
		</div>
	</div>