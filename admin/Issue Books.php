<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start ();
require_once '../db.php';
require_once '../functions.php';
if (! isset ( $_SESSION ['admin_id'] ) || isAdminLoginSessionExpired ()) {
	header ( 'location:../admin.php' );
}
$uq = makeTransIdFor ( "LI" );
?>
</head>
<body>
	<table width="100%" border="0">
		<tr>
			<td width="100%" align="center" valign="middle" class="head">Online Library System
				<p class="sub_head">Sri Venkateswara College of
					Engineering,Etcherlla</p>
			</td>
		</tr>
		<tr>
			<td><table width="100%" border="0" align="right" cellpadding="5">
					<tr>
						<td align="left">Welcome::<?php echo $_SESSION["admin_id"];?></td>
						<td align="center">&nbsp;</td>
						<td align="right"><a href="index.php" class="a1">HOME</a></td>
						<td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td align="center" bgcolor="#999999">Issue Book</td>
		</tr>
	</table>
	<form autocomplete="off" id="form1" name="form1" method="post"
		action="<?php echo $_SERVER['PHP_SELF'];?>">
		<table width="60%" border="0" align="center">
			<tr>
				<td width="15%">&nbsp;</td>
				<td width="20%">User ID:</td>
				<td width="15%"><input name="textfield" type="text" autofocus="autofocus" required="required" id="textfield"></td>
				<td width="20%">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="4" align="right"><input type="submit" name="Submit"
					id="Submit" value="Submit" /> <input type="reset" name="Reset"
					id="button" value="Reset" /></td>
			</tr>
		</table>
	</form>
<?php
if (!empty($_POST["Submit"])) {
	$bid=$_POST["textfield"];
	if(isValidBorrower("login", $bid))
		header("location:ibooks.php?BID=$bid");
	else echo "<table class=\"warning\" align=\"center\"><tr><td>Invalid Borrower ID</td></tr></table>";
}
?>      
</body>
</html>