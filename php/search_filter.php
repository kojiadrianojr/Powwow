<?php 

$nm=$_GET["nm"];
 mysql_connect("localhost","root","");
 mysql_select_db("powwow");


$res = mysql_query("SELECT forum_id, forum_name, username, category_id, forum.user_id FROM forum, user WHERE forum_name LIKE  ('$nm%') AND forum.user_id = user.user_id LIMIT 10");
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

	$catt = mysql_query("SELECT category_name FROM category WHERE category_id = '$fcat' ");
	$catt_check = mysql_fetch_array($catt);
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