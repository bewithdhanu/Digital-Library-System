<html>
<head>
<title>Admin Forget Password::Online Library System</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<table width="100%" border="0">
		<tr>
			<td align="center" valign="middle" class="head"><p>Digital Library
					System</p>
				<p class="sub_head">Sri Venkateswara College of
					Engineering,Etcherlla</p></td>
		</tr>
		<tr>
			<td><table border="0" align="right" cellpadding="5">
					<tr>
						<td align="right"><a href="index.php" class="a1">Home</a></td>
						<td align="right"><a href="reg.php" class="a1">Registration</a></td>
						<td align="right" bgcolor="#CCCCCC"><a href="admin.php" class="a1">Admin</a></td>
						<td align="right"><a href="help.php" class="a1">Help</a></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td>

				<table width="600" border="0" align="center">
					<tr>
						<td>
							<fieldset>
								<legend>Forget Password</legend>
								<form autocomplete="off" id="form1" name="form1" method="post"
									action="<?php echo $_SERVER['PHP_SELF'] ?>">
									<table width="500" border="0" align="center">
										<tr>
											<td width="30%">User Id:</td>
											<td width="70%"><input name="userid" type="text" autofocus required id="userid"
												maxlength="10" /></td>
										</tr>
										<tr>
										  <td width="30%">Security Question:</td>
										  <td width="70%"><select name="sq" required>
<option value="" selected="">- Select -</option>
<option value="What is the website that you rarely visit?">Which is the Website you rarely visit</option>
<option value="What adventurous sport your father like?">Which adventurous sport does your father enjoy</option>
<option value="What is the book your children like?">Which book do your children like</option>
<option value="Which company shares you bought first?">In which company's shares did you invest first</option>
<option value="Who is your favourite sports columnist?">Who is your favourite sports columnist?</option>
<option value="Which company you would like to work in future?">Which company would you like to work for in future</option>
<option value="What plant you like or dislike?">What plant you like or dislike?</option>
<option value="Registration no. of your first vehicle?">What is the registration number of your first vehicle</option>
<option value="What is your neighbours pet's name?">What is your neighbours pet's name?</option> <!-- CR 2040  -->
<option value="What is the name of your best friend?">What is the name of your best friend?</option>
<option value="Who is your favourite author?">Who is your favourite author?</option>
<option value="What is your favourite food?">What is your favourite food?</option>
<option value="What is your favourite hobby?">What is your favourite hobby?</option>
<option value="What is your favourite sport?">What is your favourite sport?</option>
<option value="Where did you meet your spouse?">Where did you meet your spouse?</option>
</select></td>
									  </tr>
										<tr>
										  <td width="30%">Answer:</td>
										  <td width="70%"><label for="ans"></label>
									      <input type="text" name="ans" id="ans" required></td>
									  </tr>
										<tr>
											<td colspan="2" align="center"><input type="submit"
												name="submit" id="submit" value="Submit" /> <input
												type="reset" value="Reset" /></td>
										</tr>
									</table>
								</form>
								<?php
								session_start();
								$form = $_SERVER ['REQUEST_METHOD'];
								if ($form == 'POST') {
									$userid = $_POST ['userid'];
									$sq = $_POST ['sq'];
									$ans=$_POST['ans'];
									require_once 'functions.php';require_once 'db.php';
									$a = 0;
									$sql = "SELECT * FROM u490995680_lms.admin where id='$userid' AND sq='$sq' AND asq='$ans'";
									echo $sql;
									$result = mysqli_query ( $conn, $sql );
									$type="";
									
									if (mysqli_num_rows ( $result ) > 0) {
										while ( $row = mysqli_fetch_assoc ( $result ) ) {
											if ($row ["id"] == $userid && $row ["sq"] == $sq && $row["asq"] == $ans) {
												$a ++;
												$type="23646";
												echo "sucess:".$a;
											}
										}
									}
									if ($a == 1) {
										mysqli_close($conn);
										$_SESSION ["admin_forget_type"] = $type;
										$_SESSION ["admin_forget_id"] = $userid;
										$_SESSION['admin_forget_loggedin_time'] = time();
										header ( 'Location:reset_admn.php' );
									} else {
										mysqli_close($conn);
										echo "<table class=\"warning\" align=\"center\"><tr><td>details not found!</td></tr></table>";
									}
								}
								?>
							</fieldset>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>