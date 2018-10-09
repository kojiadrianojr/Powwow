<?php
	$replies = '';
	if (isset($_GET['questionid'])) {
		$qid = mysqli_real_escape_string($con, $_GET['questionid']);
		$ans = "SELECT forum_name, forum_description, user_acc_pic, username, category_name, forum_date, forum_views, forum.user_id, forum.category_id FROM forum, user, category, user_account WHERE forum_id = '$qid' AND forum.user_id = user.user_id AND category.category_id = forum.category_id AND forum_active = 0";
		$ans_q = mysqli_query($con, $ans);
		$ans_check = mysqli_fetch_array($ans_q);
		$ans_title = $ans_check['forum_name'];
		$ans_user = $ans_check['user_id'];
		$ans_uname = $ans_check['username'];
		$ans_des = $ans_check['forum_description'];
		$ans_date = $ans_check['forum_date'];
		$date_a = date_create($ans_date);
		$date_ans = date_format($date_a, 'g:ia l jS F Y');
		$ans_cat = $ans_check['category_name'];
		$ans_cid = $ans_check['category_id'];
		$ans_views = $ans_check['forum_views'];
		$spic = $ans_check['user_acc_pic'];

		$anwerssql = "SELECT count(comment_id) AS numc FROM comment WHERE forum_id = '$qid' ";
		$answerq = mysqli_query($con, $anwerssql);
		$anscheck = mysqli_fetch_array($answerq);
		$ssvar = $anscheck['numc'];
		if ($ssvar == 0) {
			$ssvar = 0;
		}
		$fviewupdate = $ans_views+1;
		$addview = "UPDATE forum SET forum_views = '$fviewupdate' WHERE forum_id = '$qid'";
		mysqli_query($con, $addview);
	} else {
		header("Location: ../question");
	}
	if (empty($_GET['questionid'])) {
		header("Location: ../question");
	}
	
?>
<?php
	if (isset($_POST['reply'])) {
			$repcont = mysqli_real_escape_string($con, $_POST['repcont']);
			$commid = mysqli_real_escape_string($con, $_POST['bam']);
			$bom = mysqli_real_escape_string($con, $_POST['bom']);
			$repusah = $_SESSION['userid'];
			$repsql = "INSERT INTO reply(reply_content, forum_id, user_id, comment_id) VALUES ('$repcont', '$bom', '$repusah', '$commid' ) ";
			mysqli_query($con, $repsql);
			echo "<script>
	              alert('Answer Commented!');
	              </script>";
	        header("Location: ../answer/?questionid=$bom");
	        exit();
		}

?>
<?php
	include '../php/countvote.php';
?>
	<div id="container">
		<div id="wall">
			<span id="ekis" class="modal-dismiss">&times;</span>
		</div>
		<div id="content">
			<div id="question-header">
				<h2 style="color: #ff8000;"><?php echo $ans_title; ?></h2>
				<input type="submit" name="Ask" value="Ask" class="ask-btn" title="Ask a fabulous question" onclick="window.location.href='../ask';">
			</div>
			<div id="ans-details">
				<?php
					include '../php/display-comment.php';
				?>
				<ul>
					<table>
						<tr><td><span class="titled">Viewed</span></td><td> </td><td><span class="number"><?php echo $fviewupdate; ?> time(s)</span ></td></tr>
						<tr><td><span class="titled">Answered</span></td><td> </td><td><span class="number"><?php echo $ssvar ?> time(s)</span></td></tr>
						<tr><td><span class="titled">Upvoted</span></td><td> </td><td><span class="number"><?php echo $thevalue ?> time(s)</span></td></tr>
					</table>
					<div id="ans-vote">
					<h4>Vote</h4>
						<form action="../php/vote.php" method="post">
							<input type="hidden" name="forumid" value="<?php echo $qid; ?>">
							<button title="Upvote" name="upvote" class="vbtn"><i class="fa fa-arrow-up fa-lg"></i></button>
							<button title="Downvote" name="downvote" class="dvbtn"><i class="fa fa-arrow-down fa-lg"></i></button>
						</form>
					</div>
					<br>
					<br>
					
				</ul>
			</div>
			<div id="ans-cont">
				<div id="ans-content" style="color: #000;">
					<div id="tanong">
						<?php echo $ans_des; ?>
					</div>
				</div>
				<div id="ans-foot">
					<ul>
						<a href='<?php echo "../users?userid=$ans_user"; ?>'><img src="<?php echo $spic; ?>"></a>
						<span>Asked by: <?php echo "<a href='../users?userid=$ans_user'>$ans_uname</a>"; ?></span><br>
						<span>Date Asked: <?php echo "<i style='color: #000;'>$date_ans</i>"; ?></span><br>
						<span>Category: <?php echo "<a href='../category?catid=$ans_cid'>$ans_cat</a>"; ?></span>
					</ul>
					
				</div>
			</div>
			<div id="ans-comm">
				<div id="anshead"><h2>Answers:</h2></div>
				<?php
					$comm_sql = "SELECT comment_id, comment_value, comment_date, comment.user_id, forum_id, username FROM comment, user WHERE comment.user_id = user.user_id AND comment.forum_id = $qid ";
					$comm_q = mysqli_query($con, $comm_sql);
					$comm_check = mysqli_num_rows($comm_q);
					if ($comm_check == 0) {
						echo "No comments added";
					} else {
						while ($command = mysqli_fetch_array($comm_q)) {
							$comid = $command['comment_id'];
							$comval = $command['comment_value'];
							$comdate = $command['comment_date'];
							$comdate = date_create($comdate);
							$comdate = date_format($comdate, 'g:ia l jS F Y');
							$comuser = $command['username'];
							$uids = $command['user_id'];
							$img = "SELECT user_acc_pic FROM user_account WHERE user_id = '$uids' ";
							$fetch = mysqli_fetch_array(mysqli_query($con,$img));
							$picsz = $fetch['user_acc_pic'];
							$replysql = "SELECT user_id, reply_content, reply_date FROM reply WHERE forum_id = '$qid' AND comment_id = '$comid' LIMIT 5 ";
							$replyquery = mysqli_query($con, $replysql);
							if (mysqli_num_rows($replyquery) > 0) {
								while ($replyer = mysqli_fetch_array($replyquery)) {
									$repuser = $replyer['user_id'];
									$repcont = $replyer['reply_content'];
									$repdate = $replyer['reply_date'];
									$repdate = date_create($repdate);
									$repdate = date_format($repdate, 'g:ia l jS F Y');
									$usahrep = "SELECT username FROM user WHERE user_id = '$repuser' ";
									$usahq = mysqli_query($con, $usahrep);
									$usah = mysqli_fetch_array($usahq);
									$repusername = $usah['username'];
									$replies .= "
										<div class = 'reply'>
											<span class=reply-span>$repcont - <a href='../users/?userid=$repuser'>$repusername</a> </span><span class='small-span'>$repdate</span>		
										</div>
									";
								}
							} else {
								$replies = "<div class='reply'>No Comment</div>";
							}
							if (empty($picsz)) {
								$picsz = '../img/no.jpg';
							}
							echo "
									<div class='comment'>
										<div class='comm-body'>
											$comval
										</div>
											<div class='comm-head'>
												<a style='margin-right: 20px; float:left;' href='../users/?userid=$uids'><img height='40' src='$picsz'></a>
												<ul>
													<span class='comm-span'>Asked by: <a href='../users/?userid=$uids'>$comuser</a></span><br>
													<span class='comm-span'>Date Asked: <a href='#'>$comdate</a></span>
												</ul>
											</div>
										<div class='rep-container'>
											$replies
											<span class='replyto'>Comment</span>
												<div class='showtext'>
													<form action='' method='post'>
														<input type='hidden' name='bom' value='$qid'>
														<input type='hidden' name='bam' value='$comid'>
														<textarea required name='repcont' rows='2' cols='90'></textarea>
														<button name='reply'><i class='fa fa-reply'>Reply</i></button>
													</form>
												</div>
										</div>
									</div>
							";

						}
					}
				?>		
			</div>
				<div id="comm-box">
					<h2>Your answer</h2>
					<form action="../php/post.php?fid=<?php echo $qid ?>" method="post">
						<textarea id="ask-text" class="ckeditor" name="editor"></textarea>
						<button style="margin-top: 30px;" class="ask-button" title="Submit your comment" name="ansah"><strong>Answer this Question<br><i style="font-size: 30px;" class="fa fa-comment" aria-hidden="true"></i></strong></button>
					</form>
				</div>
		</div>
	</div>
	<script type="text/javascript">
		$("#ekis").click(function(){
   			$("#wall").slideToggle();
		});

		$(".replyto").click(function(){
   			$(".showtext").slideToggle();
		});
	</script>