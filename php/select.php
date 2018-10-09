<?php 

$nm=$_GET["nm"];
 mysql_connect("localhost","root","");
 mysql_select_db("powwow");


echo "<table>";
 $res=mysql_query("SELECT * FROM FORUM where forum_name like ('$nm%') ");
 while ($row=mysql_fetch_array($res)){
 	echo "<tr>";
 	echo "<td>"; echo $row["forum_name"]; echo "</td>";
 	echo "</tr>";
 }
echo "</table>";
?>