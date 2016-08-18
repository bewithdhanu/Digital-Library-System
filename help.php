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
						<td align="right"><a href="index.php" class="a1">Home</a></td>
						<td align="right"><a href="reg.php" class="a1">Registration</a></td>
						<td align="right"><a href="admin.php" class="a1">Admin</a></td>
						<td align="right" bgcolor="#CCCCCC"><a href="help.php" class="a1">Help</a></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td align="center"><h4>Table of Contents</h4>
	      <embed src="helpDLS.pdf" width="100%" height="375" type='application/pdf'></td>
		</tr>
	</table>
</body>
</html>