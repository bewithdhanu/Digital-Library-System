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
	<script src="../JQuery/jQueryAssets/jquery-1.8.3.min.js"
				type="text/javascript"></script>
			<?php
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
if (!empty($_POST["Submit"])) {
	$acc=$_POST["textfield"];
	$isbn=$_POST["isbn"];
	$psd=$_POST["password"];
	if (isValidAdmin ( $_SESSION ['admin_id'], $psd )) {
		if(!empty($acc)&&isValidAcc($acc,0)){
			$sql="UPDATE `u490995680_lms`.`books` SET `status`='-1' WHERE  `ACC`='$acc';";
			if(mysqli_query($conn,$sql)){
				echo "<table class=\"message\" align=\"center\"><tr><td>Book removed sucessfully</td></tr></table>";
			} else {
				echo "<table class=\"warning\" align=\"center\"><tr><td>Some problem has been occured,please try again later</td></tr></table>";
			}
		}else if(!empty($isbn)&&isValidISBN($isbn,0)){
			$sql="UPDATE `u490995680_lms`.`books` SET `status`='-1' WHERE  `ISBN`='$isbn';";
			if(mysqli_query($conn,$sql)){
				echo "<table class=\"message\" align=\"center\"><tr><td>Books are removed sucessfully</td></tr></table>";
			} else {
				echo "<table class=\"warning\" align=\"center\"><tr><td>Some problem has been occured,please try again later</td></tr></table>";
			}
		}else echo "<table class=\"warning\" align=\"center\"><tr><td>Invalid Book details!</td></tr></table>";
	} else {
		echo "<table class=\"warning\" align=\"center\"><tr><td>Admin Password is incorrect</td></tr></table>";
	}
}
?>
  <form autocomplete="off" id="form1" name="form1" method="post"
		action="">
		<table width="70%" border="0" align="center">
			<tr>
			  <td colspan="4" align="center" bgcolor="#999999">Remove Books</td>
		  </tr>
			<tr>
				<td colspan="4" bgcolor="#B3B0B0"><div style="font-size: x-small"><li>If you want to remove specific one book please enter Acc No</li>
			    <li>If you want romove same type of all books please choose ISBN</li><li>The book is not removed,if it is already issued to someone</li></div></td>
			</tr>

			<tr>
			  <td bgcolor="#CCCCCC">Acc No:</td>
			  <td><input name="textfield" type="text" id="textfield" /></td>
			  <td>ISBN:</td>
			  <td><input name="isbn" type="text" id="isbn" /></td>
		  </tr>
			<tr>
				<td bgcolor="#CCCCCC">Admin Password:</td>
				<td><input name="password" type="password" required="required"
					id="password" /></td>
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
</body>
</html>