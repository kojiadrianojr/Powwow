<?php
if (!empty($_REQUEST['term'])) {

$term = mysql_real_escape_string($_REQUEST['term']);     

$sql = "SELECT * FROM forum WHERE forum_name LIKE '%".$term."%'"; 
$quest_query = mysql_query($sql); 
 
while ($quest_check = mysqli_fetch_array($quest_query)) {
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

						echo "
							<div class='question'>
								<ul>
									<span>$q_views Views</span><br>
									<span>$comm_c Comments</span><br>
									<span>0 Vote</span>
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

}
?>