<?php
	include '../php/countvote.php';
?>
	<div id="container">
		<div id="wall2">
			<span id="ekis" class="modal-dismiss">&times;</span>
		</div>
		<div id="content">
				<input type="submit" name="Ask" value="Ask" class="ask-btn" title="Ask a fabulous question" onclick="window.location.href='../ask';">
				<h2>Questions</h2>

				<!--	<form method="post" id="searchform">
			<input type="submit" class="search-btn" value="Search" name="search-sub">		
				<input class="search" type="text" name="search" placeholder="Search..">
				</form>	 -->			
			<div id="question-header">
			</div>
			<div id="question-cont">

				<?php
					$quest = "SELECT * FROM forum WHERE forum_active = 0 ORDER by forum_date DESC";
					$quest_query = mysqli_query($con, $quest);
					while ($quest_check = mysqli_fetch_array($quest_query)) {
						$ifyours = '';
						$q_name = $quest_check['forum_name'];
						$q_user = $quest_check['user_id'];
						$q_date = $quest_check['forum_date'];
						$date_q = date_create($q_date);
						$date_qq = date_format($date_q, 'g:ia l jS F Y');
						$q_cat = $quest_check['category_id'];
						$q_views = $quest_check['forum_views'];
						$q_id = $quest_check['forum_id'];

						//category name
						$catt = "SELECT category_name FROM category WHERE category_id = '$q_cat' ";
						$catt_q = mysqli_query($con, $catt);
						$catt_check = mysqli_fetch_array($catt_q);
						$categ = $catt_check['category_name'];

						//user name
						$uss = "SELECT username FROM user WHERE user_id = '$q_user' ";
						$uss_q = mysqli_query($con, $uss);
						$uss_check = mysqli_fetch_array($uss_q);
						$uss_name = $uss_check['username'];

						//comments count
						$comm = "SELECT COUNT(comment_id) AS comm_count FROM comment WHERE forum_id = '$q_id' ";
						$comm_q = mysqli_query($con, $comm);
						$comm_check = mysqli_fetch_array($comm_q);
						$comm_c = $comm_check['comm_count'];

						if ($q_user == $_SESSION['userid']) {
							$ifyours  = "<a title='Delete your forum' class='delete-forum' href='../php/delete.php?fid=$q_id;'><span style='font-size: 30px;'>&times;<span></a>";
						}

						echo "
						$ifyours
							<div class='question'>
								<ul>
									<span>$q_views Views</span><br>
									<span>$comm_c Comments</span><br>
									<span>$thevalue Vote</span>
								</ul>
								<ul class='quest-title'>
								
									<h3><a href='../answer?questionid=$q_id'>$q_name</a></h3>
									<span>Asked by: <a href='../users?userid=$q_user'>$uss_name</a></span><br>
									<span>Date Asked: <i style='color: #000;'>$date_qq</i></span><br>
									<span>Category: <a href='#'>$categ</a></span><br>
								</ul>
							</div>
						";
					}
				?>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$("#ekis").click(function(){
   			$("#wall").slideToggle();
		});
	</script>