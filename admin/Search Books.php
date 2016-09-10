<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php 
session_start ();
require_once '../db.php';require_once '../functions.php';
if (! isset ( $_SESSION ['admin_id'] )||isAdminLoginSessionExpired()) {
	header ( 'location:../admin.php' );
}
?></head>

<body>
	<table width="100%" border="0">
		<tr>
			<td colspan="2" align="center" valign="middle" class="head">Online Library System
				<p class="sub_head">Sri Venkateswara College of
					Engineering,Etcherlla</p>
			</td>
		</tr>
		<tr>
			<td colspan="2"><table width="100%" border="0" align="right"
					cellpadding="5">
					<tr>
						<td align="left">Welcome::<?php echo $_SESSION["admin_id"];?></td>
						<td align="center">&nbsp;</td>
						<td align="right"><a href="index.php" class="a1">HOME</a></td>
						<td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td colspan="2" align="center">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td width="15%" align="center">
            <form autocomplete="off" class="searchform" name="form1" method="post"
					action="">
					<table width="100%" border="0">
						<tr>
							<td align="left" valign="middle"><img
								src="../images/OneSearch.png" width="250" height="60"
								alt="One Sreach" /></td>
						</tr>
						<tr>
							<td align="center" valign="middle"><input name="search"
								type="text" autofocus="autofocus" required class="search" id="textfield"
								placeholder="Search With: Title | Author | Acc No | ISBN " /></td>
						</tr>
						<tr>
							<td align="center" valign="middle"><p>
						      <input name="Submit"
								type="submit" class="button" id="Submit" value="Search" />
						      &nbsp;
								<input name="Submit1" type="submit" class="button" id="Submit1"
								value="Google Search" />
							</p>
						    <p>&nbsp; </p></td>
						</tr>
					</table>
				</form>
							<?php
							if (isset ( $_POST ["Submit"] )) {
								$res= $_POST ["search"];
								header("location:res.php?search=$res");
							}
							?>
				</form>
			</td>
		</tr>
	</table>
</body>
</html>