<?php 
session_start();
require_once 'functions.php';require_once 'db.php';
if(isset($_SESSION["forget_id"])) {
	if(isForgetSessionExpired()) {
		if(!isset($_SESSION["forget_type"]))
			header("location:reset.php");
	}
}
?>
<html>
<head>
<title>Digital Library System</title>
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
								<legend>Forget Password</legend>
								<form autocomplete="off" id="form1" name="form1" method="post"
									action="<?php echo $_SERVER['PHP_SELF'] ?>">
									<table width="300" border="0" align="center">
										<tr>
											<td width="40%">User Id:</td>
											<td><input name="userid" type="text" autofocus="autofocus" required="required" id="userid"
												maxlength="10" /></td>
										</tr>
										<tr>
											<td width="40%">Email:</td>
											<td><input name="email" type="email" id="email"
												required="required" /></td>
										</tr>
										<tr>
											<td colspan="2" align="center"><input type="submit"
												name="submit" id="submit" value="Submit" /> <input
												type="reset" value="Reset" /></td>
										</tr>
									</table>
								</form>
								<?php
								$form = $_SERVER ['REQUEST_METHOD'];
								if ($form == 'POST') {
									$userid = $_POST ['userid'];
									$mail = $_POST ['email'];
									$a = 0;
									$sql = "SELECT * FROM u490995680_lms.login";
									$result = mysqli_query ( $conn, $sql );
									$type="";
									
									if (mysqli_num_rows ( $result ) > 0) {
										while ( $row = mysqli_fetch_assoc ( $result ) ) {
											if ($row ["id"] == $userid && $row ["email"] == $mail) {
												$a ++;
												$type=$row ["type"];
											}
										}
									}
									if ($a == 1) {
										$_SESSION ["forget_type"] = $type;
										$_SESSION ["forget_id"] = $userid;
										$_SESSION['forget_time'] = time();
										header ( 'Location:reset.php' );
									} else {
										echo "<table class=\"warning\" align=\"center\"><tr><td>details not found!</td></tr></table>";
									}
									mysqli_close($conn);
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