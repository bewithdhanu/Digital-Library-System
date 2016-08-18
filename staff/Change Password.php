<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Digital Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php session_start();
require_once '../db.php';
require_once '../functions.php';
if (! isset ( $_SESSION ['user_id'] ) || isLoginSessionExpired ()||$_SESSION["user_type"]!="staff") {
	header ( 'location:../index.php' );
}
?></head>

<body>
<table width="100%" border="0">
  <tr>
    <td width="100%" align="center" valign="middle" class="head">Digital Library
      System
      <p class="sub_head">Sri Venkateswara College of
        Engineering,Etcherlla</p></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="right" cellpadding="5">
      <tr>
        <td align="left">Welcome::<?php echo $_SESSION["user_id"];?></td>
        <td align="center">&nbsp;</td>
        <td align="right"><a href="index.php" class="a1">HOME</a></td>
        <td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#999999">Change Password</td>
  </tr>
</table>
<form autocomplete="off" id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="60%" border="0" align="center">
    <tr>
      <td bgcolor="#CCCCCC">Old Password:</td>
      <td><label for="textfield"></label>
        <input name="old" type="password" autofocus="autofocus" required="required" id="textfield"/></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC">New Password:</td>
      <td><input type="password" name="new" id="new" required="required"/></td>
    </tr>
    <tr>
      <td bgcolor="#CCCCCC">Re enter Password:</td>
      <td><input type="password" name="new1" id="new1" required="required"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="Submit" id="Submit" value="Submit" />
        <input type="reset" name="Reset" id="Reset" value="Reset" /></td>
    </tr>
  </table>
</form>
<?php 
if(!empty($_POST["Submit"])){
	$old=$_POST["old"];
	$new=$_POST["new"];
	$new1=$_POST["new1"];
	$id=$_SESSION["user_id"];
	if(isValidIDPwd($id, $old)){
		if($new==$new1){
			$sql="UPDATE `u490995680_lms`.`login` SET `pswrd`='$new' WHERE  `id`='$id';";
			if(mysqli_query($conn, $sql)){
				echo "<table class=message align=center><tr><td>Sucessfully changed</td></tr></table>";
			}else echo "<table class=warning align=center><tr><td>Some problem has been occured!</td></tr></table>";
		}else echo "<table class=warning align=center><tr><td>Password miss match!</td></tr></table>";
	}else echo "<table class=warning align=center><tr><td>invalid old password!</td></tr></table>";
}
?>
</body>
</html>