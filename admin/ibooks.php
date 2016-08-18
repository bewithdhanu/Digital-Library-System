<?php
if ($_GET ["BID"] == "" || ! isset ( $_GET ["BID"] ))
	header ( "location:Issue Books.php" );
else
	$res = $_GET ["BID"];
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Digital Library System</title>
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
<?php 
$type=getIDType($res);
?>
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
		action="">
		<table width="100%" border="0">
			<tr>
				<td width="15%">&nbsp;</td>
				<td width="20%">&nbsp;</td>
				<td width="15%">&nbsp;</td>
				<td width="20%">&nbsp;</td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Transaction Id</td>
				<td><label for="textfield7"></label> <input name="textfield3"
					type="text" id="textfield7" readonly="readonly"
					value="<?php echo $uq;?>" /></td>
				<td bgcolor="#CCCCCC">Borrower Id</td>
				<td><label for="textfield11"></label> <input name="textfield4"
					type="text" autofocus="autofocus" required id="textfield11" readonly value="<?php echo $res;?>"/></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC"><label for="textfield8">Acc No</label></td>
				<td><input type="text" name="textfield" id="textfield8" required /><a href=res.php target="_blank" class="a1" style="font-size: x-small;">search book</a></td>
				<td bgcolor="#CCCCCC"><label for="select3">Select Card</label></td>
				<td>
<?php 
if($type=="student"){
?>				
				<select name="select" id="select3" required="required">
						<option value="">-Select-</option>
						<option value="RT">Reference</option>
						<option value="T1">Token 1</option>
						<option value="T2">Token 2</option>
						<option value="T3">Token 3</option>
				</select>
<?php 
}elseif($type=="staff"){
?>				
<select name="select" id="select3" required="required">
						<option value="">-Select-</option>
						<option value="T1">Token 1</option>
						<option value="T2">Token 2</option>
						<option value="T3">Token 3</option>
						<option value="T4">Token 4</option>
						<option value="T5">Token 5</option>
						<option value="T6">Token 6</option>
				</select>
<?php }?>				
				</td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Admin Password</td>
				<td><label for="password"></label> <input type="password"
					name="password" id="password" required /></td>
				<td bgcolor="#CCCCCC"><label for="textfield9">Asst Initial</label></td>
				<td><input type="text" name="textfield2" id="textfield9"
					required="required" /></td>
			</tr>
			<tr>
				<td colspan="4" align="right"><input type="submit" name="issue"
					id="Submit" value="Issue" /> <input type="reset" name="Reset"
					id="button" value="Reset" /></td>
			</tr>
		</table>
	</form>
<?php
if (!empty($_POST["issue"])) {
	$ad = $_SESSION ["admin_id"];
	$id = $_POST ['textfield4'];
	$card = $_POST ['select'];
	$psd = $_POST ['password'];
	$asst = $_POST ['textfield2'];
	$acc = $_POST ['textfield'];
	$count = 0;
	if (! isValidAdmin ( $ad, $psd )) {
		echo "<table class=\"warning\" align=\"center\"><tr><td>Invalid Admin Password</td></tr></table>";
		$count ++;
	}
	if (! isValidBorrower ( "login", $id )) {
		echo "<table class=\"warning\" align=\"center\"><tr><td>Borrower Id not available!</td></tr></table>";
		$count ++;
	}
	if (! isCardAvaliable ( $id, $card, $type)) {
		echo "<table class=\"warning\" align=\"center\"><tr><td>Token is alredy issued!</td></tr></table>";
		$count ++;
	}
	if (! isValidAcc ( $acc ,'0')) {
		echo "<table class=\"warning\" align=\"center\"><tr><td>Book does not exist with the Account No!</td></tr></table>";
		$count ++;
	}
	if (! isBookAvail ( $acc )) {
		echo "<table class=\"warning\" align=\"center\"><tr><td>Book is already issued to some others!</td></tr></table>";
		$count ++;
	}
	if ($count == 0) {
		if (issueBooks ( $uq, $id, $card, $acc, $asst, $type)) {
			echo "<table class=\"message\" align=\"center\"><tr><td>Book issued Sucessfully!</td></tr></table>";
	} else {
			echo "<table class=\"warning\" align=\"center\"><tr><td>Some Problem Has been Occured,Please try again later!</td></tr></table>";
		}
	}
}
?>      
</body>
</html>