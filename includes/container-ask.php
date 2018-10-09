	<?php
		$tErr = 'Ask a Question';
		if (isset($_POST['ask-sub'])) {
			$title = mysqli_real_escape_string($con, $_POST['title']);
			$cat = $_POST['category'];
			$des = $_POST['editor'];
			$user = $_SESSION['userid'];
			if (!empty($title) && !empty($cat) && !empty($des)) {
				$ask = "INSERT INTO forum(forum_name, forum_description, category_id, user_id) VALUES ('$title','$des','$cat', '$user') ";
				mysqli_query($con, $ask);
				header("Location: ../question");
			} else {
				$tErr = '<span class="error-span">You must fillup every form</span>';
			}
		}
	?>
	<div id="container">
		<div id="wall">
			<span id="ekis" class="modal-dismiss">&times;</span>
		</div>
		<div id="content">
			<div id="question-header">
				<h2><?php echo $tErr; ?></h2>
			</div>
			<div id="ask-cont">
				<div id="ask">
					<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
						<div id="ask-header">

							<ul style="float: left;">
							<label>Question Title:</label><br>
							<input type="text" name="title" placeholder="Title of your question" title="Enter a title" class="ask-title" maxlength="40" onkeyup="aa()" id="t1" autocomplete="off">
							<div style="width: 300px; padding-left: 10px; text-align: left; position: absolute; border: 1px outset #000; float: left; visibility: hidden; background-color: white; overflow: hidden; z-index: 1" id="d1"></div>
							</ul>
							
													
							<script type="text/javascript">
							  function aa(){
							  		xmlhttp= new XMLHttpRequest();
							  		xmlhttp.open("GET","../php/select.php?nm="+document.getElementById("t1").value,false);
							  		xmlhttp.send(null);
							  		document.getElementById("d1").innerHTML=xmlhttp.responseText;
							  		document.getElementById("d1").style.visibility='visible';
								}
							</script>

							<ul style="float: right;">
								<label>Question Category</label><br>
								<select name="category" value="1">
									<?php
										$category = "SELECT * FROM category";
										$cat_query = mysqli_query($con, $category);
										while ($cat_check = mysqli_fetch_array($cat_query)) {
											$val = $cat_check['category_id'];
											$des_cat = $cat_check['category_des'];
											echo "<option title='$des_cat' value='$val'>"; echo $cat_check['category_name']; echo "</option> \n";
										}
									?>
								</select>
							</ul>

						</div>

						<textarea id="ask-text" class="ckeditor" name="editor" placeholder="This is where you add your question."></textarea>
						<button style="margin-top: 30px;" class="ask-button" title="Submit your question" name="ask-sub"><strong>Ask your Question<br><i style="font-size: 30px;" class="fa fa-comment" aria-hidden="true"></i></strong></button>
					</form>

				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$("#ekis").click(function(){
   			$("#wall").slideToggle();
		});
		//var simplemde = new SimpleMDE({ element: document.getElementById("ask-text")});
	</script>