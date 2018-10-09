	<?php
/*
	if (isset($_POST['search'])) {
		$valueToSearch = $_POST['search_box'];
		$mainsql = "SELECT forum_id, forum_name, username, forum.user_id FROM forum, user WHERE CONCAT('forum_id','forum_name','username') LIKE  '%".$valueToSearch."%'";
		$search_result = filterTable($mainsql);
	}
	else{
		$mainsql = "SELECT forum_id, forum_name, username, forum.user_id FROM forum, user";
		$search_result = filterTable($mainsql);
	}

	function filterTable($mainsql){
		$connect = mysqli_connect("localhost","root","","powwow");
		$filter_Result = mysqli_query($connect, $mainsql);
		return $filter_Result;
	}
*/


	?>
	<div id="container">
		<div id="wall">
			<span id="ekis" class="modal-dismiss">&times;</span>
		</div>
		<div id="content">
			
			<div class="tab">
							
				<p style="color: black;"><strong>SEARCH:</strong>
				<input autocomplete="off" onkeyup="aa()" class="search" type="text" name="search_box" placeholder="Search..." id="t1">
				</p>	
			</div>

			<div style="width: 99%; padding-left: 10px; text-align: left; position: absolute; border: 1px inset;  background-color: white; z-index: 1; border-radius: 10px;" id="d1">
		
				<?php
				 mysql_connect("localhost","root","");
				 mysql_select_db("powwow");


				$res = mysql_query("SELECT forum_id, forum_name, username, category_id, forum.user_id FROM forum, user WHERE forum.user_id = user.user_id LIMIT 10");
				echo "
				<table width='50%' cellpadding='5' cellspacing='15'>
				<tr>
				<td>FORUM NAME</td>
				<td>AUTHOR</td>
				<td>CATEGORY</td>
				</tr>

				";
					while ($main=mysql_fetch_array($res)) {
					$fids = $main['forum_id'];
					$title = $main['forum_name'];
					$fuser = $main['username'];
					$fuid = $main['user_id'];
					$fcat = $main['category_id'];

					$catt = "SELECT category_name FROM category WHERE category_id = '$fcat' ";
					$catt_q = mysqli_query($con, $catt);
					$catt_check = mysqli_fetch_array($catt_q);
					$categ = $catt_check['category_name'];

				echo "
				<tr>
					<td style=''> <a href='../answer/?questionid=$fids'>$title</a></td>
					<td style='text-align: center; color: black;'><a href='../users/?userid=$fuid'>$fuser</a></td>
					<td> $categ </td>
				</tr>
				";
				}
				echo "</table";
				?>
		
			</div>
		</div>
	</div>
	<script type="text/javascript">
							  function aa(){
							  		xmlhttp= new XMLHttpRequest();
							  		xmlhttp.open("GET","../php/search_filter.php?nm="+document.getElementById("t1").value,false);
							  		xmlhttp.send(null);
							  		document.getElementById("d1").innerHTML=xmlhttp.responseText;
				
								}
							</script>
	<script type="text/javascript">
		$("#ekis").click(function(){
   			$("#wall").slideToggle();
		});
	</script>