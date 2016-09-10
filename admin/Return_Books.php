<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
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
$uq = makeTransIdFor ( "LF" );
?></head>

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
			<td align="center" bgcolor="#999999">&nbsp;</td>
		</tr>
	</table>
	<?php
	if (! empty ( $_POST ["Return"] )) {
		$un = $_SESSION ["admin_id"];
		$pd = $_POST ["ap"];
		$ra = $_POST ["rai"];
		$ia = $_POST ["iai"];
		$id = $_POST ["id"];
		$tid = $_POST ["tid"];
		$acc = $_POST ["acc"];
		$card = $_POST ["card"];
		$doi = $_POST ["doi"];
		$rad = $_POST ["radio"];
		$fine = $_POST ["fine"];
		$dor = date ( "Y-m-d" );
		$type = getIDType ( $id );
		?>
	<table width="100%" border="0">
		<tbody>
			<tr>
				<td width="16%">&nbsp;</td>
				<td width="16%" bgcolor="#CCCCCC">Transaction ID:</td>
				<td width="16%"><?php echo $tid;?></td>
				<td width="16%" bgcolor="#CCCCCC">Acc No:</td>
				<td width="16%"><?php echo $acc;?></td>
				<td width="16%">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td bgcolor="#CCCCCC">Issue Date:</td>
				<td><?php echo $doi;?></td>
				<td bgcolor="#CCCCCC">Return Date:</td>
				<td><?php echo date("Y-m-d");?></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td bgcolor="#CCCCCC">Issued by:</td>
				<td><?php echo $ia;?></td>
				<td bgcolor="#CCCCCC">Returned by:</td>
				<td><?php echo $ra;?></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td bgcolor="#CCCCCC">Fine:</td>
				<td><input type="number" name="fine" value="<?php echo $fine;?>"
					readonly /> &#8377;</td>
				<td colspan=3>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="4" align="right"><input type="submit" name="accept"
					value="OK,Save" /></td>
				<td>&nbsp;</td>
			</tr>
		</tbody>
	</table>
	<?php
		if ($_SESSION["check"] == 1) {
			if ($fine > 0) {
				if (! isBookAvail ( $acc )) {
					if (addFine ( $uq, $id, $tid, $acc, $fine, "NO", $dor, $ra )) {
						
						if ($rad == "return") {
							if (isValidAdmin ( $un, $pd )) {
								if (returnBooks ( $tid, $ra, $acc, $id, $card, $type )) {
									echo "<table class=\"message\" align=\"center\"><tr><td>Book returned Sucessfully!</td></tr></table>";
									$_SESSION ["check"] = "0";
								} else {
									echo "<table class=\"warning\" align=\"center\"><tr><td>Some Problem Has been Occured,Please try again later!</td></tr></table>";
								}
							} else {
								echo "<table class=\"warning\" align=\"center\"><tr><td>Invalid Admin Password</td></tr></table>";
							}
						} elseif ($rad == "renewal") {
							if (isValidAdmin ( $un, $pd )) {
								if (renewBooks ( $tid, $ra, $acc, $id, $card, $type )) {
									echo "<table class=\"message\" align=\"center\"><tr><td>Book renewed Sucessfully!</td></tr></table>";
									$_SESSION ["check"] = "0";
								} else {
									echo "<table class=\"warning\" align=\"center\"><tr><td>Some Problem Has been Occured,Please try again later!</td></tr></table>";
								}
							} else {
								echo "<table class=\"warning\" align=\"center\"><tr><td>Invalid Admin Password</td></tr></table>";
							}
						}
					}
				} else {
					echo "<table class=warning border=0><tr><td align=center>Book already Returned or not issued,please check details by clicking BACK..</td></tr></teble>";
				}
			} else {
				if (! isBookAvail ( $acc )) {
					if ($rad == "return") {
						if (isValidAdmin ( $un, $pd )) {
							if (returnBooks ( $tid, $ra, $acc, $id, $card, $type )) {
								echo "<table class=\"message\" align=\"center\"><tr><td>Book returned Sucessfully!</td></tr></table>";
								$_SESSION["check"]="0";
							} else {
								echo "<table class=\"warning\" align=\"center\"><tr><td>Some Problem Has been Occured,Please try again later!</td></tr></table>";
							}
						} else {
							echo "<table class=\"warning\" align=\"center\"><tr><td>Invalid Admin Password</td></tr></table>";
						}
					} elseif ($rad == "renewal") {
						if (isValidAdmin ( $un, $pd )) {
							if (renewBooks ( $tid, $ra, $acc, $id, $card, $type )) {
								echo "<table class=\"message\" align=\"center\"><tr><td>Book renewed Sucessfully!</td></tr></table>";
								$_SESSION ["check"] = "0";
							} else {
								echo "<table class=\"warning\" align=\"center\"><tr><td>Some Problem Has been Occured,Please try again later!</td></tr></table>";
							}
						} else {
							echo "<table class=\"warning\" align=\"center\"><tr><td>Invalid Admin Password</td></tr></table>";
						}
					}
				} else {
					echo "<table class=warning border=0><tr><td align=center>Book already Returned or not issued,please check details by clicking BACK..</td></tr></teble>";
				}
			}
		} else
			echo "<table class=warning border=0><tr><td align=center>Book already issued to the user,please check details by clicking BACK..</td></tr></teble>";
	}
	?>

	<table width="100%" align="right">
		<tr>
			<td align="right"><a href="Return Books.php">Back..</a></td>
		</tr>
	</table>
</body>
</html>