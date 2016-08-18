<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Digital Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php session_start();
include_once '../db.php';
include_once '../functions.php';
if (! isset ( $_SESSION ['admin_id'] ) || isAdminLoginSessionExpired ()) {
	header ( 'location:../admin.php' );}
include_once '../functions.php';
?></head>

<body>
	<table width="100%" border="0">
		<tr>
			<td width="100%" align="center" valign="middle" class="head">Digital
				Library System
				<p class="sub_head">Sri Venkateswara College of
					Engineering,Etcherlla</p>
			</td>
		</tr>
		<tr>
			<td><table width="100%" border="0" align="right" cellpadding="5">
					<tr>
						<td align="left">Welcome::<?php echo $_SESSION["admin_id"];?></td>
						<td align="center"><a onClick="window.print()" class="a1">Print</a></td>
						<td align="right"><a href="index.php" class="a1">HOME</a></td>
						<td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td align="center" bgcolor="#999999">&nbsp;</td>
		</tr>
	</table>
	<form action="" method="post" name="form1" id="form1"
		autocomplete="off">
		<table width="60%" border="0" align="center">
			<tbody>
				<tr>
					<td width="25%">&nbsp;</td>
					<td width="25%">Student ID:</td>
					<td><input type="text" name="textfield" id="textfield" /></td>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td width="25%" align="right"><input type="submit" name="submit"
						id="submit" value="Submit" /></td>
					<td width="25%">&nbsp;</td>
				</tr>
			</tbody>
		</table>
	</form>
<?php
if (isset ( $_POST ["submit"] )) {
	$res = $_POST ["textfield"];
	if (isValidBorrower ( "students", $res )) {
		header ( "location:View Fine.php?ID=$res" );
	} else {
		echo "<table class=\"warning\" align=center><tr><td align=center>Invalid Student Borrower No</td></tr></table>";
	}
}
?>
</body>
</html>