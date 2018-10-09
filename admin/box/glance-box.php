					<div class="box">
						<h2>At a Glance</h2>
						<div class="utils">
						</div>
						<table>
							<tbody>
								<tr>
									<?php 
									$connection = mysql_connect('localhost', 'root', ''); 
									mysql_select_db('powwow');

									$result = mysql_query("SELECT COUNT(*) as count FROM comment");
									while ($row = mysql_fetch_array($result)) {
									$var = $row['count'];
									}
									 ?>
									<td><?php echo "$var";  ?> Comment</td>
								</tr>
								<tr>

									<?php 
									$connection = mysql_connect('localhost', 'root', ''); 
									mysql_select_db('powwow');

									$result = mysql_query("SELECT COUNT(*) as count FROM category");
									while ($row = mysql_fetch_array($result)) {
									$var = $row['count'];
									}
									 ?>
									<td><?php echo "$var";  ?> Category</td>

								</tr>
								<tr>
		
									<?php 
									$connection = mysql_connect('localhost', 'root', ''); 
									mysql_select_db('powwow');

									$result = mysql_query("SELECT COUNT(*) as count FROM forum");
									while ($row = mysql_fetch_array($result)) {
									$var = $row['count'];
									}
									 ?>
									<td><?php echo "$var";  ?> Threads</td>

								</tr>
								<tr>
									<?php 
									$connection = mysql_connect('localhost', 'root', ''); 
									mysql_select_db('powwow');

									$result = mysql_query("SELECT COUNT(*) as count FROM user_account");
									while ($row = mysql_fetch_array($result)) {
									$var = $row['count'];
									}
									 ?>
									<td><?php echo "$var";  ?> Total Users</td>
									
								</tr>
							</tbody>
						</table>
						
					</div>