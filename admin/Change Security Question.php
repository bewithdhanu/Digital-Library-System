<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Digital Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php session_start();
require_once '../db.php';
require_once '../functions.php';
if (! isset ( $_SESSION ['admin_id'] ) || isAdminLoginSessionExpired ()) {
	header ( 'location:../admin.php' );}
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
        <td align="left">Welcome::<?php echo $_SESSION["admin_id"];?></td>
        <td align="center">&nbsp;</td>
        <td align="right"><a href="index.php" class="a1">HOME</a></td>
        <td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center" bgcolor="#999999">Change Security Question</td>
  </tr>
</table>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="0" align="center">
    <tr>
      <td>Old Security Question:</td>
      <td><select name="osq" required="required">
        <option value="" selected="selected">- Select -</option>
        <option value="What is the website that you rarely visit?">Which is the Website you rarely visit</option>
        <option value="What adventurous sport your father like?">Which adventurous sport does your father enjoy</option>
        <option value="What is the book your children like?">Which book do your children like</option>
        <option value="Which company shares you bought first?">In which company's shares did you invest first</option>
        <option value="Who is your favourite sports columnist?">Who is your favourite sports columnist?</option>
        <option value="Which company you would like to work in future?">Which company would you like to work for in future</option>
        <option value="What plant you like or dislike?">What plant you like or dislike?</option>
        <option value="Registration no. of your first vehicle?">What is the registration number of your first vehicle</option>
        <option value="What is your neighbours pet's name?">What is your neighbours pet's name?</option>
        <!-- CR 2040  -->
        <option value="What is the name of your best friend?">What is the name of your best friend?</option>
        <option value="Who is your favourite author?">Who is your favourite author?</option>
        <option value="What is your favourite food?">What is your favourite food?</option>
        <option value="What is your favourite hobby?">What is your favourite hobby?</option>
        <option value="What is your favourite sport?">What is your favourite sport?</option>
        <option value="Where did you meet your spouse?">Where did you meet your spouse?</option>
      </select></td>
    </tr>
    <tr>
      <td width="32%">New Security Question:</td>
      <td width="68%"><select name="nsq" required="required">
        <option value="" selected="selected">- Select -</option>
        <option value="What is the website that you rarely visit?">Which is the Website you rarely visit</option>
        <option value="What adventurous sport your father like?">Which adventurous sport does your father enjoy</option>
        <option value="What is the book your children like?">Which book do your children like</option>
        <option value="Which company shares you bought first?">In which company's shares did you invest first</option>
        <option value="Who is your favourite sports columnist?">Who is your favourite sports columnist?</option>
        <option value="Which company you would like to work in future?">Which company would you like to work for in future</option>
        <option value="What plant you like or dislike?">What plant you like or dislike?</option>
        <option value="Registration no. of your first vehicle?">What is the registration number of your first vehicle</option>
        <option value="What is your neighbours pet's name?">What is your neighbours pet's name?</option>
        <!-- CR 2040  -->
        <option value="What is the name of your best friend?">What is the name of your best friend?</option>
        <option value="Who is your favourite author?">Who is your favourite author?</option>
        <option value="What is your favourite food?">What is your favourite food?</option>
        <option value="What is your favourite hobby?">What is your favourite hobby?</option>
        <option value="What is your favourite sport?">What is your favourite sport?</option>
        <option value="Where did you meet your spouse?">Where did you meet your spouse?</option>
      </select></td>
    </tr>
    <tr>
      <td width="32%">NewvAnswer:</td>
      <td width="68%"><label for="ans"></label>
        <input type="text" name="ans" id="ans" required="required" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit"
												name="submit" id="submit" value="Submit" />
        <input
												type="reset" value="Reset" /></td>
    </tr>
  </table>
</form>
<?php 
include_once '../db.php';
include_once '../functions.php';
if(!empty($_POST["submit"])){
	$osq=$_POST["osq"];
	$nsq=$_POST["nsq"];
	$ans=$_POST["ans"];
	$ch=0;
	$id=$_SESSION["admin_id"];
	$sql="select *from u490995680_lms.admin where id='$id'";
	$result=mysqli_query($conn, $sql);
	while($row=mysqli_fetch_assoc($result)){
		if($row["sq"]==$osq)
			$ch=1;
	}
	mysqli_free_result($result);
	if($ch==1){
		$sql="UPDATE `u490995680_lms`.`admin` SET `sq`='$nsq', `asq`='$ans' WHERE  `id`='$id'";
		if(mysqli_query($conn, $sql)){
			echo "<table class=message align=center><tr><td>Sucessfully updated!</td></tr></table>";
		}else echo "<table class=warning align=center><tr><td>Suome problem has been occured!</td></tr></table>";
	}else echo "<table class=warning align=center><tr><td>Old Sequrity Question is wrong!</td></tr></table>";
}
?>
</body>
</html>