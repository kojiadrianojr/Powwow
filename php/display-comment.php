<?php 
	$connection = mysql_connect('localhost', 'root', ''); 
	mysql_select_db('powwow');

	$result = mysql_query("SELECT COUNT(*) as count FROM comment");
	while ($row = mysql_fetch_array($result)) {
	$var = $row['count'];
	}
?>