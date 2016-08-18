<?php 
session_start();
require_once 'functions.php';require_once 'db.php';
if(isset($_SESSION["id"])) {
	if(!isAdminLoginSessionExpired()) {
		header("location:admin/");
	}
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Login::Digital Library System</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<table width="100%" border="0">
		<tr>
			<td align="center" valign="middle" class="head">Digital Library
				System
				<p class="sub_head">Sri Venkateswara College of
					Engineering,Etcherlla</p>
			</td>
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
			<td><table width="40%" border="0" align="center">
					<tr>
						<td>
							<fieldset>
								<legend>Login</legend>
<?php
if (! isset ( $_SESSION ["count"] )) {
	$_SESSION ["count"] = 0;
}
$form = $_SERVER ['REQUEST_METHOD'];
if ($form == 'POST') {
	$userid = $_POST ['userid'];
	$pswrd = $_POST ['pswd'];
	
	$sql = "SELECT * FROM u490995680_lms.admin";
	$result = mysqli_query ( $conn, $sql );
	$a = 0;
	$block = "no";
	$pwd = "";
	if (mysqli_num_rows ( $result ) > 0) {
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			if ($row ["id"] == $userid) {
				$a ++;
				$block = $row ["block"];
				$pwd = $row ["pswrd"];
			}
		}
	}
	if ($a == 1) {
		if ($block == "no") {
			if ($pswrd == $pwd) {
				$_SESSION ["count"] = 0;
				session_destroy ();
				session_start ();
				$_SESSION ["admin_type"] = "admin";
				$_SESSION ["admin_id"] = $userid;
				$_SESSION['admin_loggedin_time'] = time();
				header ( 'Location:admin/' );
			} elseif ($pswrd != $pwd) {
				$_SESSION ["count"] = $_SESSION ["count"] + 1;
				display($_SESSION["count"],$userid);
			}
		} elseif ($block == "yes") {
			if ($pswrd == $pwd) {
				?>
<table width="400" border="0" align="center" class="warning">
	<tr>
		<td colspan="2">Your Account has been blocked,You need to <b>Reset
				Your Password</b> to prove your identity
		</td>
	</tr>
</table>
<?php
			} elseif ($pswrd != $pwd) {
				echo "<table class=\"warning\" align=center><tr><td>Invalid Password or loggin id!</a></td></tr></table>";
				$_SESSION["count"]=0;
			}
		}
	} else {
		display($_SESSION["count"],"");
		$_SESSION["count"]=0;
	}

}
function display($count,$id){
	if ($count < 3) {
		echo "<table class=\"warning\" align=center><tr><td>Invalid Password or loggin id!</a></td></tr></table>";
	} elseif ($count >= 3) {
		global $conn;
		$sql="UPDATE u490995680_lms.admin SET block='yes' WHERE id='$id'";
		if(mysqli_query($conn, $sql)){
		?>
		<table width="400" border="0" align="center" class="warning">
			<tr>
				<td colspan="2">Your Account has been blocked,You need to <b>Reset
					Your Password</b> to prove your identity
				</td>
			</tr>
		</table>
		<?php
		}
		else{
			?>
				<table width="400" border="0" align="center" class="message">
					<tr>
						<td colspan="2">
							Site is under maintainence,please try another time!
						</td>
					</tr>
				</table>
			<?php 
		}
	}
}
mysqli_close($conn);
?>								
								<form autocomplete="off" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"
									enctype="multipart/form-data" name="form1" id="form1">
									<table width="400" border="0" align="center">
										<tr>
											<td width="40%">User Id:</td>
											<td><input name="userid" type="text" autofocus="autofocus" required="required" id="userid"
												maxlength="10" /></td>
										</tr>
										<tr>
											<td width="40%">Password:</td>
											<td><input name="pswd" type="password" id="pswd"
												maxlength="10" required="required" /></td>
										</tr>
										<tr>
											<td colspan="2" align="center"><input type="submit"
												name="submit" id="submit" value="Login" /> <input
												type="reset" value="Reset" /></td>
										</tr>
										<tr>
											<td colspan="2">If you forget your password <a
												href="admin_forget.php" class="a1">CLICK HERE</a>
											</td>
										</tr>
									</table>
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