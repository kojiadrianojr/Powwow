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

			<div style="width: 99%; padding-left: 10px; text-align: left; position: absolute; border: 1px outset #000;  background-color: white; z-index: 1" id="d1">
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