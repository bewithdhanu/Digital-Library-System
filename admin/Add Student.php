<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Digital Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../JQuery/jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="../JQuery/jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="../JQuery/jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="../JQuery/jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="../JQuery/jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
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
    <td colspan="6" align="center" valign="middle" class="head">Digital Library
      System
      <p class="sub_head">Sri Venkateswara College of
        Engineering,Etcherlla</p></td>
  </tr>
  <tr>
    <td colspan="6"><table width="100%" border="0" align="right" cellpadding="5">
      <tr>
        <td align="left">Welcome::<?php echo $_SESSION["admin_id"];?></td>
        <td align="center">&nbsp;</td>
        <td align="right"><a href="index.php" class="a1">HOME</a></td>
        <td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
<table>
<tr>
<td>
				<center>
					<h2>Registration for Students</h2>
				</center>
				<form autocomplete="off" id="form1" name="form1" method="post"
					enctype="multipart/form-data"
					action="<?php echo $_SERVER['PHP_SELF'] ?>">
					<?php
					$form = $_SERVER ['REQUEST_METHOD'];
					if ($form == 'POST') {
						$valid = 0;
						$uploadDir = '../images/';
						$fileName = $_FILES ['Photo'] ['name'];
						$tmpName = $_FILES ['Photo'] ['tmp_name'];
						$fileSize = $_FILES ['Photo'] ['size'];
						$fileType = $_FILES ['Photo'] ['type'];
						$post_userid = $_POST ['reg_no'];
						$post_email = $_POST ['email'];
						$post_name = $_POST ['name'];
						$post_fname = $_POST ['f_name'];
						$post_gender = $_POST ['gender'];
						$post_dob = $_POST ['dob'];
						$post_course = $_POST ['course'];
						$post_branch = $_POST ['branch'];
						$post_doj = $_POST ['doj'];
						$post_address = $_POST ['address'];
						$post_mobile = $_POST ['mobile'];
						$filePath = $uploadDir . $fileName;
						$result = move_uploaded_file ( $tmpName, $filePath );
						$post_pwd1 = $_POST ['pwd1'];
						$post_pwd2 = $_POST ['pwd2'];
						if (! $result) {
							echo "<table class=\"warning\" align=\"center\"><tr><td>Error uploading file</td></tr></table>";
							$valid ++;
						}
						if (strlen ( $post_userid ) != 10) {
							echo "<table class=\"warning\" align=\"center\"><tr><td>>Registration No must be 10 characters!</td></tr></table>";
							$valid ++;
						}
						if ($post_pwd1 != $post_pwd2) {
							echo "<table class=\"warning\" align=\"center\"><tr><td>Password mis match!</td></tr></table>";
							$valid ++;
						}
						if (isValidBorrower("students",$post_userid)||isValidBorrower("login", $post_userid)||isValidBorrower("staff", $post_userid)) {
							echo "<table class=\"warning\" align=\"center\"><tr><td>Id already exists!</td></tr></table>";
							$valid ++;
						}
						if (! get_magic_quotes_gpc ()) {
							$fileName = addslashes ( $fileName );
							$filePath = addslashes ( $filePath );
						}
						if ($valid == 0) {
							$sql = "INSERT INTO u490995680_lms.students VALUES ('$post_userid', '$post_email', '$post_name','$post_fname','$post_gender','$post_dob','$post_course','$post_branch','$post_doj','$post_address','$post_mobile','$filePath');";
							$sql .= "INSERT INTO u490995680_lms.login VALUES ('$post_userid', '$post_email', '$post_pwd1','student','on');";
							$sql .= "INSERT INTO u490995680_lms.cards VALUES ('$post_userid','0','0','0','0');";
							if (mysqli_multi_query ( $conn, $sql )) {
								echo "<table class=\"message\" align=\"center\"><tr><td>New user successfully added,Now<a href=\"index.php\"> click here to login</a></td></tr></table>";
							} else {
								echo "<table class=\"warning\" align=\"center\"><tr><td>Some problem has been occured,Please try again later!!!</td></tr></table>";
							}
						}
						mysqli_close($conn);
					}
					?>
					<table width="100%" border="1" align="center">
						<tr>
							<td width="25%" align="left" bgcolor="#CCCCCC">Registration No:</td>
							<td width="25%"><input name="reg_no" type="text" autofocus="autofocus" required id="reg_no"
								maxlength="10" /></td>
							<td width="25%" bgcolor="#CCCCCC">Email:</td>
							<td width="25%"><input name="email" type="email"
								required="required" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" /></td>
						</tr>
						<tr>
							<td width="25%" align="left" bgcolor="#CCCCCC">Name:</td>
							<td width="25%"><input type="text" id="name" name="name"
								required="required" /></td>
							<td width="25%" bgcolor="#CCCCCC">Father Name:</td>
							<td width="25%"><input type="text" id="f_name" name="f_name"
								required="required" /></td>
						</tr>
						<tr>
							<td width="25%" align="left" bgcolor="#CCCCCC">Gender:</td>
							<td width="25%"><input type="radio" name="gender" id="gender"
								value="Male" required /> Male <input type="radio" name="gender"
								value="Female" required /> Female</td>
							<td width="25%" bgcolor="#CCCCCC">Date of Birth(YYYY-MM-DDY):</td>
							<td width="25%"><input type="text" id="dob" name="dob"></td>
						</tr>
						<tr>
							<td width="25%" align="left" bgcolor="#CCCCCC">Course:</td>
							<td width="25%"><select name="course" id="course" name="course"
								required="required">
									<option value="">-Select-</option>
									<option value="B.Tech">B.Tech</option>
									<option value="M.Tech">M.Tech</option>
									<option value="MBA">MBA</option>
							</select></td>
							<td width="25%" bgcolor="#CCCCCC">Branch:</td>
							<td width="25%"><select name="branch" id="branch" name="branch"
								required="required">
									<option value="">-Select-</option>
									<option value="CSE">CSE</option>
									<option value="CIVIL">CIVIL</option>
									<option value="EEE">EEE</option>
									<option value="ECE">ECE</option>
									<option value="MECH">MECH</option>
							</select></td>
						</tr>
						<tr>
							<td width="25%" align="left" bgcolor="#CCCCCC">Date of
								Joining(YYYY-MM-DDY):</td>
							<td width="25%"><input type="text" id="doj" name="doj"></td>
							<td width="25%" bgcolor="#CCCCCC">Address:</td>
							<td width="25%"><textarea name="address" id="address"
									name="address" required="required"></textarea></td>
						</tr>
						<tr>
							<td width="25%" align="left" bgcolor="#CCCCCC">Mobile:</td>
							<td width="25%"><input type="text" id="mobile" name="mobile"
								required="required" /></td>
							<td width="25%" bgcolor="#CCCCCC">Photo</td>
							<td width="25%"><input type="file" name="Photo" size="2000000"
								accept="image/gif, image/jpeg, image/x-ms-bmp, image/x-png"
								size="26" required></td>
						</tr>
						<tr>
							<td width="25%" align="left" bgcolor="#CCCCCC">Password:</td>
							<td width="25%"><input type="password" id="pwd1" name="pwd1"
								required="required" maxlength="10" /></td>
							<td width="25%" bgcolor="#CCCCCC">Re enter Password:</td>
							<td width="25%"><input type="password" id="pwd2" name="pwd2"
								required="required" maxlength="10" /></td>
						</tr>
						<tr>
							<td colspan="4"><input type="checkbox" name="tnc" id="tnc"
								required="required" /> <label for="tnc">I will handle the book
									carefully. If any damage is done to the book, I will replace it
									with a new copy of same. In case of loss of books, I will pay
									amount as applicable</label></td>
						</tr>
						<tr>
							<td colspan="4" align="center"><input type="submit" id="submit"
								value="Submit" /> <input type="reset" /></td>
						</tr>
					</table>
				</form>
			</td>
</tr>
</table>
<script type="text/javascript">
$(function() {
	$( "#dob" ).datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:"yy-mm-dd",
yearRange: '1972:2011'
	}); 
});
$(function() {
	$( "#doj" ).datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:"yy-mm-dd"
	}); 
});
</script>

</td>

  </tr>
</table>
</body>
</html>