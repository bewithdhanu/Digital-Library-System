<html>
<head>
<title>Forget Password::Digital Library System</title>
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

				<table width="40%" border="0" align="center">
					<tr>
						<td>
							<fieldset>
								<legend>Reset Password</legend>
								<form autocomplete="off" id="form1" name="form1" method="post"
									action="<?php echo $_SERVER['PHP_SELF'] ?>">
									<table width="300" border="0" align="center">
										<tr>
											<td width="40%">New Password:</td>
											<td><input name="pwd1" type="password" autofocus="autofocus" required="required" id="pwd1" autocomplete="off"
												maxlength="10" /></td>
										</tr>
										<tr>
											<td width="40%">Re Enter Password:</td>
											<td><input name="pwd2" type="password" id="pwd2"
												required="required" maxlength="10" /></td>
										</tr>
										<tr>
											<td colspan="2" align="center"><input type="submit"
												name="submit" id="submit" value="Submit" /> <input
												type="reset" value="Reset" /></td>
										</tr>
									</table>
								</form>
								<?php
								session_start ();
								IF (! isset ( $_SESSION ['admin_forget_id'] ) && ! isset ( $_SESSION ['admin_forget_type'] )&&isAdminForgetSessionExpired()) {
									header ( 'Location:admin_forget.php' );
								} else {
									$form = $_SERVER ['REQUEST_METHOD'];
									$id=$_SESSION ['admin_forget_id'];
									if ($form == 'POST') {
										$post_pwd1 = $_POST ['pwd1'];
										$post_pwd2 = $_POST ['pwd2'];
										if ($post_pwd1 == $post_pwd2) {
											require_once 'functions.php';require_once 'db.php';
											if(mysqli_query($conn, "UPDATE u490995680_lms.admin SET pswrd='$post_pwd1', block='no' WHERE id='$id'" ))
											{
												echo "<table class=\"message\" align=\"center\"><tr><td>Pasword changed sucessfully</td></tr></table>";
												session_destroy();
												//header('location:index.php');
												?>
<script type="text/javascript">
function Redirect()
{
    window.location="index.php";
}
document.write("You will be redirected to main page in 3 sec.");
setTimeout('Redirect()', 3000);
</script>
												<?php 
											}else{
												echo "<table class=\"warning\" align=\"center\"><tr><td>Some problem has been occured,please try again later!!</td></tr></table>";
												//header('location:forget.php');
											}
											
										} else {
											echo "<table class=\"warning\" align=\"center\"><tr><td>PASSWORD MISS MATCH!</td></tr></table>";
										}
										mysqli_close($conn);
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