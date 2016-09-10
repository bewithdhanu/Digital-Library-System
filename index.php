<?php 
session_start();
require_once 'functions.php';require_once 'db.php';
if(isset($_SESSION["user_id"])) {
	if(!isLoginSessionExpired()) {
		if($_SESSION["user_type"]=="student")
			header("location:student/");
		else if($_SESSION["user_type"]=="staff")
			header("location:staff/");
	}
}
?>
<html>
<head>
<link rel="icon" href="icon.jpeg" type="image/x-icon">
<title>Online Library System</title>
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
						<td align="right" bgcolor="#CCCCCC"><a href="index.php" class="a1">Home</a></td>
						<td align="right"><a href="reg.php" class="a1">Registration</a></td>
						<td align="right"><a href="admin.php" class="a1">Admin</a></td>
						<td align="right"><a href="help.php" class="a1">Help</a></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td>
				<table width="40%" border="0" align="center">
					<tr>
						<td>
							<fieldset>
								<legend>Login</legend>
								<?php
								$form = $_SERVER ['REQUEST_METHOD'];
								if ($form == 'POST') {
									$userid = $_POST ['userid'];
									$pswd = $_POST ['password'];
									$a = 0;
									$sql = "SELECT * FROM u490995680_lms.login where id='$userid' AND pswrd='$pswd' AND status='on'";
									$result = mysqli_query ( $conn, $sql );
									$type="";
									if (mysqli_num_rows ( $result ) > 0) {
										while ( $row = mysqli_fetch_assoc ( $result ) ) {
											if ($row ["id"] == $userid && $row ["pswrd"] == $pswd) {
												$a ++;
												$type=$row ["type"];
											}
										}
									}
									if ($type == "student" && $a==1) {
										$_SESSION ["user_type"] = $type;
										$_SESSION ["user_id"] = $userid;
										$_SESSION["loggedin_time"] = time();
										header ( 'Location:student/' );
									} else if ($type == "staff" && $a==1) {
										$_SESSION ["user_type"] = $type;
										$_SESSION ["user_id"] = $userid;
										$_SESSION["loggedin_time"] = time();
										header ( 'Location:staff/' );
									} else{
										echo "<table class=\"warning\" align=\"center\"><tr><td>login details not found!</td></tr></table>";
									}
								}
								mysqli_close($conn);
								?>
								<form autocomplete="off" id="form1" name="form1" method="post" class="pure-form pure-form-stacked"
									action="<?php echo $_SERVER['PHP_SELF'] ?>">
									<table width="300" border="0" align="center">
										<tr>
											<td width="40%">User Id:</td>
											<td><input name="userid" type="text" autofocus required="required" id="userid"
												maxlength="10" /></td>
										</tr>
										<tr>
											<td width="40%">Password:</td>
											<td><input name="password" type="password" id="password"
												required="required" /></td>
										</tr>
										<tr>
											<td colspan="2" align="center"><input type="submit"
												name="submit" id="submit" value="Submit" /> <input
												type="reset" value="Reset" /></td>
										</tr>
									</table>
									<div  align="center"><a href="reg.php" class="a1">New Registration</a> | <a href="forget.php" class="a1">Forget Password?</a></div>
								</form>
							</fieldset>
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</body>
</html>