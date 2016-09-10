<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php
if (! isset ( $_GET ["TID"] ))
	header ( "location:Return Books.php?TID=" );
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
	if ($_GET ["TID"] == "") {
		?>
        <form autocomplete="off" id="form2" name="form2" method="post"
		action="">
		<table width="100%">
			<tr>
				<td width="25%">&nbsp;</td>
				<td width="25%"><label for="textfield">Transaction Id of Issue/Acc
						No:</label></td>
				<td width="25%"><input name="textfield" type="text"
					autofocus="autofocus" id="textfield"
					pattern="^(LR|LI|LF)[0-9]{11,14}$|^[0-9]{0,6}$" required /></td>
				<td width="25%">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="2" valign="top"><h6>
						<li>Enter either transaction id of issue or Accession No of book
							to return book</li>
					</h6></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td align="right"><input name="submit" type="submit" id="submit"
					value="Submit" /> <input type="reset" name="reset2" id="reset2"
					value="Reset" /></td>
				<td>&nbsp;</td>
			</tr>
		</table>
	</form>
	<?php
		if (! empty ( $_POST ["submit"] )) {
			$tid = $_POST ["textfield"];
			header ( "location:Return Books.php?TID=$tid" );
		}
	}
	if ($_GET ["TID"] != "") {
		$tid = $_GET ["TID"];
		$str = substr ( $tid, 0, 2 );
		$count = 0;
		$tid2 = 0;
		$bid = 0;
		$acc = 0;
		$card = 0;
		$asst = 0;
		$doi = 0;
		$sql = "select *from u490995680_lms.issues where tid='$tid' OR acc='$tid' AND dor='1111-11-11'";
		$result = mysqli_query ( $conn, $sql );
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			if ($row ["tid"] == $tid || $row ["acc"] == $tid) {
				$count = 1;
				$tid2 = $row ["tid"];
				$bid = $row ["id"];
				$acc = $row ["acc"];
				$card = $row ["card"];
				$asst = $row ["IA"];
				$doi = $row ["doi"];
			}
		}
		mysqli_free_result ( $result );
		if ($count == 0) {
			echo ("<table class=\"warning\" border=0 align=\"center\"><tr><td>Sorry! You have entered wrong details Try agrain.. </td></tr></table><table border=0 align=\"center\"><tr><td><a href=\"Return Books.php\" >Back..</a></td></tr></table>");
		} elseif ($count == 1) {
			$dor = date ( "Y-m-d" );
			$date1 = date_create ( $doi );
			$date2 = date_create ( $dor );
			$diff = date_diff ( $date2, $date1 );
			$days = $diff->format ( "%a" );

			if($card=="RT")
			$fine = calculateFine ( getIDType ( $bid ), $days+10 );
			else
				$fine = calculateFine ( getIDType ( $bid ), $days );
			$_SESSION["check"]="1";
			?>
		<form autocomplete="off" id="form1" name="form1" method="post"
		action="Return_Books.php">
		<table width="100%" border="0">
			<tr>
				<td width="15%" bgcolor="#CCCCCC">Transaction Id</td>
				<td width="20%"><input type="text" value="<?php echo $tid2;?>"
					name="tid" readonly="readonly" /></td>
				<td width="15%" bgcolor="#CCCCCC">Borrower Id</td>
				<td width="20%"><input type="text" value="<?php echo $bid;?>"
					name="id" form="form1" readonly="readonly" /></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Acc No</td>
				<td><input type="text" readonly="readonly" name="acc"
					value="<?php echo $acc;?>" /><a
					href="res.php?search=<?php echo $acc;?>" class="a1"
					style="font-size: x-small;" target="_blank">view book</a></td>
				<td bgcolor="#CCCCCC">Card</td>
				<td><input type="text" readonly="readonly" name="card"
					value="<?php echo $card;?>"></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC"><label for="textfield9">Date of Issue</label></td>
				<td><input type="text" readonly="readonly" name="doi"
					value="<?php echo $doi;?>" /></td>
				<td bgcolor="#CCCCCC"><label for="textfield9">Issued asst Initial</label></td>
				<td><input type="text" readonly="readonly" name="iai"
					value="<?php echo $asst;?>" /></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Delay days:</td>
				<td><?php if($card=="RT")echo $days;else echo 10-$days;?></td>
				<td bgcolor="#CCCCCC">Fine:</td>
				<td><input type="number" name="fine" value="<?php echo $fine;?>" />
					&#8377;</td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Returning asst Initial</td>
				<td><input name="rai" type="text" autofocus="autofocus"
					required="required" id="rai" /></td>
				<td bgcolor="#CCCCCC">Admin Password</td>
				<td><input name="ap" type="password" required="required" id="ap" /></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Select Type:</td>
				<td><input name="radio" type="radio" required="required" id="radio"
					value="return" /> <label for="radio">Return </label> <input
					name="radio" type="radio" required="required" id="radio2"
					value="renewal" /> <label for="radio2">Renewal </label></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>

			<tr>
				<td colspan="4" align="right"><input name="Return" type="submit"
					id="Return" value="Return" /> <input name="reset" type="reset"
					id="reset" value="Reset" /><a href="Return Books.php">Back..</a></td>
			</tr>
		</table>
	</form>
		<?php
		}
	}
	?>
</body>
</html>