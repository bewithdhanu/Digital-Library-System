<?php 
session_start ();
require_once '../db.php';require_once '../functions.php';
if (! isset ( $_SESSION ['admin_id'] )||isAdminLoginSessionExpired()) {
	header ( 'location:../admin.php' );
}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Digital Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

<table width="100%" border="0">
  <tr>
    <td align="center" valign="middle" class="head">Digital Library
      System
      <p class="sub_head">Sri Venkateswara College of
    Engineering,Etcherlla</p></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="right" cellpadding="5">
      <tr>
        <td align="left">Welcome::<?php echo $_SESSION["admin_id"];?></td>
        <td align="center">&nbsp;</td>
        <td align="right"><a href="../logout.php" class="a1" onclick="return confirm('Are you sure?');">LOGOUT</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="100%" border="0">
      <tr>
        <td colspan="4" align="center" bgcolor="#999999">Services to the Librarian</td>
        </tr>
      <tr>
        <td width="25%" align="left" valign="top"><table width="100%" border="0">
          <tr>
            <td colspan="2" align="center" bgcolor="#CCCCCC">Borrowers</td>
          </tr>
          <tr>
            <td colspan="2"><a href="Borrower Profile.php" class="a1">Borrower Profile</a></td>
          </tr>
          <tr>
            <td width="50%" class="a1"><a href="Add Student.php" class="a1">Add Student</a></td>
          </tr>
          <tr>
            <td width="50%" class="a1"><a href="Add Staff.php" class="a1">Add Staff</a></td>
          </tr>
          <tr>
            <td colspan="2"><a href="ActDeact.php" class="a1">Activate/Deactivate Borrower</a></td>
          </tr>
          <tr>
            <td colspan="2"><a href="Change Borrower Password.php" class="a1">Change Borrower Password</a></td>
          </tr>
          <tr>
            <td colspan="2"><a href="View Fine.php" class="a1">View Fine</a></td>
          </tr>
          <tr>
            <td colspan="2"><a href="View Status.php" class="a1">View Status</a></td>
          </tr>
        </table></td>
        <td width="25%" align="left" valign="top"><table width="100%" border="0">
          <tr>
            <td align="center" bgcolor="#CCCCCC">Books</td>
          </tr>
          <tr>
            <td><a href="Issue Books.php" class="a1">Issue Books</a></td>
          </tr>
          <tr>
            <td class="a1"><a href="Return Books.php" class="a1">Return Books</a></td>
          </tr>
          <tr>
            <td><a href="Search Books.php" class="a1">Search Books</a></td>
          </tr>
          <tr>
            <td><a href="Add Books.php" class="a1">Add Books</a></td>
          </tr>
          <tr>
            <td><a href="Remove Books.php" class="a1">Remove Books</a></td>
          </tr>
        </table></td>
        <td width="25%" align="left" valign="top"><table width="100%" border="0">
          <tr>
            <td align="center" bgcolor="#CCCCCC">Transactions</td>
          </tr>
          <tr>
            <td><a href="All Transactions.php" class="a1">All Transactions</a></td>
          </tr>
        </table></td>
        <td align="left" valign="top" width="25%"><table width="100%" border="0">
          <tr>
            <td align="center" valign="top" bgcolor="#CCCCCC">Profile</td>
            </tr>
          <tr>
            <td align="left" valign="top" class="a1"><a href="Change Password.php" class="a1">Change Password</a></td>
            </tr>
          <tr>
            <td align="left" valign="top" class="a1"><a href="Change Security Question.php" class="a1">Change Security Question</a></td>
            </tr>
        </table></td>
        </tr>
    </table></td>
  </tr>
</table>
</body>
</html>