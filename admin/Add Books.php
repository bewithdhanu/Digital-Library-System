<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../JQuery/jQueryAssets/jquery.ui.core.min.css"
	rel="stylesheet" type="text/css">
	<link href="../JQuery/jQueryAssets/jquery.ui.theme.min.css"
		rel="stylesheet" type="text/css">
		<link href="../JQuery/jQueryAssets/jquery.ui.datepicker.min.css"
			rel="stylesheet" type="text/css">
			<script src="../JQuery/jQueryAssets/jquery-1.8.3.min.js"
				type="text/javascript"></script>
			<script
				src="../JQuery/jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js"
				type="text/javascript"></script><?php
				session_start ();
				require_once '../db.php';
				require_once '../functions.php';
				if (! isset ( $_SESSION ['admin_id'] ) || isAdminLoginSessionExpired ()) {
					header ( 'location:../admin.php' );
				}
				?>


</head>
<body>
	<table width="100%" border="0">
		<tr>
			<td colspan="4" align="center" valign="middle" class="head">Online Library System
				<p class="sub_head">Sri Venkateswara College of
					Engineering,Etcherlla</p>
			</td>
		</tr>
		<tr>
			<td colspan="4"><table width="100%" border="0" align="right"
					cellpadding="5">
					<tr>
						<td align="left">Welcome::<?php echo $_SESSION["admin_id"];?></td>
						<td align="center">&nbsp;</td>
						<td align="right"><a href="index.php" class="a1">HOME</a></td>
						<td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
					</tr>
				</table></td>
		</tr>
	</table>
<?php
$form = $_SERVER ['REQUEST_METHOD'];
if ($form == 'POST') {
	$val [0] = $_POST ['dobi'];
	$val [1] = $_POST ['textfield2'];
	$val [2] = $_POST ['textfield4'];
	$val [3] = $_POST ['textfield5'];
	$val [4] = $_POST ['textfield6'];
	$val [5] = $_POST ['textfield7'];
	$val [6] = $_POST ['textfield8'];
	$val [7] = $_POST ['textfield9'];
	$val [8] = $_POST ['textfield10'];
	$val [9] = $_POST ['textfield11'];
	$val [10] = $_POST ['textfield12'];
	$val [11] = $_POST ['textfield13'];
	$val [12] = $_POST ['textfield14'];
	$val [13] = $_POST ['textfield15'];
	$val [14] = $_POST ['textfield16'];
	$val [15] = $_POST ['textfield17'];
	$pass = $_POST ['textfield3'];
	if (isValidAdmin ( $_SESSION ['admin_id'], $pass )) {
		if (addBook ( $val )) {
			echo "<table class=\"message\" align=\"center\"><tr><td>Books are added sucessfully</td></tr></table>";
		} else {
			echo "<table class=\"warning\" align=\"center\"><tr><td>Some problem has been occured,please try again later</td></tr></table>";
		}
	} else {
		echo "<table class=\"warning\" align=\"center\"><tr><td>Admin Password is incorrect</td></tr></table>";
	}
}
?>
  <form autocomplete="off" id="form1" name="form1" method="post"
		action="<?php echo $_SERVER['PHP_SELF'];?>">
		<table width="70%" border="0" align="center">
			<tr>
				<td colspan="4" align="center" bgcolor="#999999">Add Books</td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Date of Bill:</td>
				<td><input name="dobi" type="text" autofocus="autofocus" required
					id="dobi" /></td>
				<td bgcolor="#CCCCCC">Bill No:</td>
				<td><input type="text" required name="textfield2" id="textfield2" /></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Call No:</td>
				<td><input type="text" required="required" name="textfield4"
					id="textfield4" /></td>
				<td bgcolor="#CCCCCC">Title:</td>
				<td><input type="text" required="required" name="textfield5"
					id="textfield5" /></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Author:</td>
				<td><input type="text" required="required" name="textfield6"
					id="textfield6" /></td>
				<td bgcolor="#CCCCCC">Place of Publication:</td>
				<td><input type="text" required="required" name="textfield7"
					id="textfield7" /></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Name of Publication:</td>
				<td><input type="text" required="required" name="textfield8"
					id="textfield8" /></td>
				<td bgcolor="#CCCCCC">Year of Publication:</td>
				<td><input type="text" required="required" name="textfield9"
					id="textfield9" /></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Subject:</td>
				<td><input type="text" required="required" name="textfield10"
					id="textfield10" /></td>
				<td bgcolor="#CCCCCC">Edition:</td>
				<td><input type="text" required="required" name="textfield11"
					id="textfield11" /></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Volume:</td>
				<td><input type="text" required="required" name="textfield12"
					id="textfield12" /></td>
				<td bgcolor="#CCCCCC">ISBN:</td>
				<td><input name="textfield13" type="text" required="required"
					id="textfield13"
					pattern="(?:(?=.{17}$)97[89][ -](?:[0-9]+[ -]){2}[0-9]+[ -][0-9]|97[89][0-9]{10}|(?=.{13}$)(?:[0-9]+[ -]){2}[0-9]+[ -][0-9Xx]|[0-9]{9}[0-9Xx])" /></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Pages:</td>
				<td><input type="text" required="required" name="textfield14"
					id="textfield14" /></td>
				<td bgcolor="#CCCCCC">Price:</td>
				<td><input type="text" required="required" name="textfield15"
					id="textfield15" /></td>
			</tr>
			<tr>
				<td bgcolor="#CCCCCC">Remarks:</td>
				<td><input type="text" required="required" name="textfield16"
					id="textfield16" /></td>
				<td bgcolor="#CCCCCC">No of Copies:</td>
				<td><label for="textfield17"></label> <input name="textfield17"
					type="number" required="required" id="textfield17" max="50" min="1" /></td>
			</tr>

			<tr>
				<td bgcolor="#CCCCCC">Admin Password:</td>
				<td><input name="textfield3" type="password" required="required"
					id="textfield3" /></td>
				<td>&nbsp;</td>
				<td align="right">&nbsp;</td>
			</tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td align="right"><input type="submit" name="Submit" id="button"
				value="Submit" /><input type="reset" name="Reset" id="Reset"
				value="Reset" /></td>
			</tr>
		</table>
	</form>
	<script type="text/javascript">
$(function() {
	$( "#dobi" ).datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:"yy-mm-dd"
	}); 
});
</script>
</body>
</html>