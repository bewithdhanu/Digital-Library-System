<?php
session_start ();
include ("../functions.php");
if (! isset ( $_SESSION ['user_id'] )||isAdminLoginSessionExpired()||$_SESSION["user_type"]!="staff") {
	header ( 'location:../index.php' );
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Digital Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
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
			<td><table width="100%" border="0" align="right" cellpadding="5">
					<tr>
						<td align="left">Welcome::<?php echo $_SESSION["user_id"];?></td>
						<td align="center">&nbsp;</td>
						<td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td><table width="100%" border="0">
					<tr>
						<td colspan="3" align="center" bgcolor="#999999">Services to the
							Librarian</td>
					</tr>
					<tr>

						<td width="25%" align="left" valign="top"><table width="100%"
								border="0">
								<tr>
									<td><a href="All Transactions.php" class="a1">All Transactions</a></td>
								</tr>
								<tr>
									<td><a href="View Status.php" class="a1">View Status</a></td>
								</tr>
								<tr>
								  <td align="left" valign="top" class="a1"><a href="Search Book.php" class="a1">Search Book</a></td>
						  </tr>
								<tr>

									<td align="left" valign="top" class="a1"><a
										href="View Profile.php" class="a1">View Profile</a></td>
								</tr>
								<tr>
									<td align="left" valign="top" class="a1"><a
										href="Change Password.php" class="a1">Change Password</a></td>

								</tr>
							</table></td>
						<td align="center" valign="middle" style="font-style: italic; font-size: medium; color: #905A5B;">Welcome User</td>
					</tr>
				</table></td>
		</tr>
	</table>
</body>
</html>