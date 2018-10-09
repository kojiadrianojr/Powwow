<?php
	include_once '../php/profile.php';

?>
	<div id="container">
		<div id="contuser">
			<div id="contuser-img">
				<img id="hey" title="<?php echo $user_row['username']; ?>" src="<?php echo $upic; ?>">
				<h2><?php echo $uname ?></h2>
				<?php echo $wow; ?>
			</div>
		</div>
		<div id="content">
			<div class="tab">
				<button class="tablinks" onclick="openCity(event, 'Featured')">Activities</button>
				<button class="tablinks" onclick="openCity(event, 'Hot')">About</button>
			</div>
			<div id="Featured" class="tabcontent">
			  <h3>Activity</h3>
			  <div id="act-cont">
			  <?php
				
					$forum_user = "SELECT * FROM forum WHERE user_id = '$user_id' ORDER by forum_date DESC";
					$forum_query = mysqli_query($con, $forum_user);
				  	while ($forum_check = mysqli_fetch_array($forum_query)) {
				  		$for_act = $forum_check['forum_name'];
				  		$for_view = $forum_check['forum_views'];
				  		$for_id = $forum_check['forum_id'];
				  		//comments count
							$comm = "SELECT COUNT(comment_id) AS comm_count FROM comment WHERE forum_id = '$for_id' ";
							$comm_q = mysqli_query($con, $comm);
							$comm_check = mysqli_fetch_array($comm_q);
							$comm_c = $comm_check['comm_count'];
				  		echo "
				  		<div class='user-act'>
				  		<p><a href=''>$for_act</a></p>
				  		<table>
				  		<tr>
				  			<td><span>$for_view</span></td>&nbsp;<td><span>$comm_c</span></td>
				  		</tr>
				  		<tr>
				  			<td><span>Views</span></td>&nbsp;<td><span>Comments</span></td>
				  		</tr>
						</table>
				  		</div>";
				  	}
				
			  ?>
			  </div>
			</div>
			<div id="Hot" class="tabcontent">
			  <h3>User Bio:</h3>
			  <p class="user-p"><?php echo $ubio; ?></p>
			  <h3>User Email:</h3>
			  <p class="user-p"><?php echo $uemail; ?></p>
			  <h3>Joined in:</h3>
			  <p class="user-p"><?php echo $user_row['user_acc_date']; ?></p> 
			</div>
		</div>
	</div>
	<script type="text/javascript">
		function readURL(input) {
			var url = input.value;
			var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
	        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
	            var reader = new FileReader();

	            reader.onload = function (e) {
	                $('#blah')
	                    .attr('src', e.target.result);
	                $('#how')
	                    .attr('src', e.target.result);
	                $('#hey')
	                    .attr('src', e.target.result);
	            };
	            reader.readAsDataURL(input.files[0]);
	        }	else{
         			$('#blah').attr('src', '../img/invalid.jpg');
         			$('#how').attr('src', '../img/invalid.jpg');
         			$('#hey').attr('src', '../img/invalid.jpg');
   				 }
   		 }

	</script>