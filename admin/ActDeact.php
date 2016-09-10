<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<title>Online Library System</title>
<?php
session_start ();
require_once '../db.php';
require_once '../functions.php';
if (! isset ( $_SESSION ['admin_id'] ) || isAdminLoginSessionExpired ()) {
	header ( 'location:../admin.php' );
}
?></head>

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
			<td align="center" bgcolor="#999999">Remove Borrower</td>
		</tr>
	</table>
<?php
$ad = $_SESSION ["admin_id"];
if (isset ( $_GET ["id"] ) && $_GET ["id"] != "") {
	$id = $_GET ["id"];
	$stat = isIDExist ( $id );
	if (! strcmp ( $stat, "false" )) {
		echo "<table class=\"warning\" align=\"center\"><tr><td>Borrower Id not available!</td></tr></table><table align=\"center\"><tr><td align=\"right\"><a href=\"ActDeact.php\" >back..</a></td></tr></table>";
	} else {
		?>
<form autocomplete="off" id="form1" name="form1" method="post">
		<table width="60%" border="0" align="center">
			<tr>
				<td bgcolor="#CCCCCC">Id no of Borrower:</td>
				<td><label for="actdctid"></label> <input name="actdctid"
					type="text" id="actdctid" required value="<?php echo $id;?>"
					readonly /></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Account Status:</td>
				<td><input type="text" value="<?php echo $stat;?>" readonly
					style="text-transform: uppercase;"></input></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Admin Password:</td>
				<td><input type="password" name="actdctpwd" id="textfield3"
					autofocus="true" /></td>
			</tr>
			<tr>
				<td colspan="2">Click Submit to Activate/Deactivate Your Account</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="Submit3"
					id="Submit3" value="Submit" /><a href="ActDeact.php">back..</a></td>
			</tr>
		</table>
	</form>		
<?php
		if (! empty ( $_POST ['Submit3'] )) {
			$psd = $_POST ['actdctpwd'];
			if (isValidAdmin ( $ad, $psd )) {
				if (! strcmp ( $stat, "on" )) {
					$sql = "UPDATE `u490995680_lms`.`login` SET `status`='off' WHERE `id`='$id';";
					if (mysqli_query ( $conn, $sql )) {
						echo "<table class=\"message\" align=\"center\"><tr><td>Account Deactivated sucessfully</td></tr></table>";
					} else {
						echo "<table class=\"warning\" align=\"center\"><tr><td>Some problem has been occured,please try again later</td></tr></table>";
					}
				} elseif (! strcmp ( $stat, "off" )) {
					$sql = "UPDATE `u490995680_lms`.`login` SET `status`='on' WHERE `id`='$id';";
					if (mysqli_query ( $conn, $sql )) {
						echo "<table class=\"message\" align=\"center\"><tr><td>Account Activated sucessfully</td></tr></table>";
					} else {
						echo "<table class=\"warning\" align=\"center\"><tr><td>Some problem has been occured,please try again later</td></tr></table>";
					}
				}
			}
		}
		?>
<?php
	}
} else {
	?>
<form autocomplete="off" id="form1" name="form1" method="post">
		<table width="60%" border="0" align="center">
			<tr>
				<td bgcolor="#CCCCCC">Id no of Borrower:</td>
				<td><label for="actdctid"></label> <input name="actdctid" autofocus
					type="text" id="actdctid" required /> <input type="submit"
					name="Submit" id="Submit" value="Check" /></td>
			</tr>
		</table>
	</form>
<?php
	if (! empty ( $_POST ['Submit'] )) {
		$id = $_POST ['actdctid'];
		header ( "location:ActDeact.php?id=$id" );
	}
}
?>
	</form>
</body>
</html>