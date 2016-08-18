<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link href="css/style.css" rel="stylesheet" type="text/css" />
<link href="JQuery/jQueryAssets/jquery.ui.core.min.css" rel="stylesheet" type="text/css">
<link href="JQuery/jQueryAssets/jquery.ui.theme.min.css" rel="stylesheet" type="text/css">
<link href="JQuery/jQueryAssets/jquery.ui.datepicker.min.css" rel="stylesheet" type="text/css">
<script src="JQuery/jQueryAssets/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="JQuery/jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js" type="text/javascript"></script>
</head>

<body>
<table>
<tr>
<td>
				<center>
					<h2>Staff Registration Form</h2>
				</center>
				<form autocomplete="off" id="form1" name="form1" method="POST"
					enctype="multipart/form-data"
					action="<?php echo $_SERVER['PHP_SELF'];?>">
				<?php
				$form = $_SERVER ['REQUEST_METHOD'];
				if ($form == 'POST') {
					$valid = 0;
					require_once 'functions.php';require_once 'db.php';
					$uploadDir = 'images/';
					$fileName = $_FILES ['Photo'] ['name'];
					$tmpName = $_FILES ['Photo'] ['tmp_name'];
					$fileSize = $_FILES ['Photo'] ['size'];
					$fileType = $_FILES ['Photo'] ['type'];
					$post_userid = $_POST ['uid'];
					$post_email = $_POST ['email'];
					$post_name = $_POST ['name'];
					$post_desg = $_POST ['desg'];
					$post_doj = $_POST ['doj'];
					$post_address = $_POST ['address'];
					$post_mobile = $_POST ['mobile'];
					$post_pwd1 = $_POST ['pwd1'];
					$post_pwd2 = $_POST ['pwd2'];
					
					$filePath = $uploadDir . $fileName;
					$result = move_uploaded_file ( $tmpName, $filePath );
					
					if (strlen ( $post_userid ) != 10) {
						echo "<table style=\"color:red;\"><tr><td>Registration No must be 10 characters!</td></tr></table>";
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
						$sql = "INSERT INTO u490995680_lms.staff VALUES ('$post_userid', '$post_name','$post_desg' ,'$post_email','$post_address','$post_mobile','$post_doj','$filePath');";
						$sql .= "INSERT INTO u490995680_lms.login VALUES ('$post_userid', '$post_email', '$post_pwd1','staff','on');";
						$sql .= "INSERT INTO u490995680_lms.scards VALUES ('$post_userid','0','0','0','0','0','0');";
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
							<td width="25%" bgcolor="#CCCCCC">Borrower's Number:</td>
							<td width="25%"><input name="uid" type="text" autofocus="autofocus" required
								maxlength="10" /></td>
							<td width="25%" bgcolor="#CCCCCC">Name:</td>
							<td width="25%"><input type="text" id="name" name="name"
								required="required" /></td>
						</tr>
						<tr>
							<td width="25%" bgcolor="#CCCCCC">Designation:</td>
							<td width="25%"><select name="desg" name="desg"
								required="required">
									<option value="">-Select-</option>
									<option value="Teaching Faculty">Teaching Faculty</option>
									<option value="Non Teaching Faculty">Non Teaching Faculty</option>
							</select></td>
							<td width="25%" bgcolor="#CCCCCC">Email:</td>
							<td width="25%"><input name="email" type="email"
								required="required" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" /></td>
						</tr>
						<tr>
							<td width="25%" bgcolor="#CCCCCC">Address:</td>
							<td width="25%"><textarea name="address" name="address"
									required="required"></textarea></td>
							<td width="25%" bgcolor="#CCCCCC">Phone:</td>
							<td width="25%"><input name="mobile" type="text"
								required="required" maxlength="13" /></td>
						</tr>
						<tr>
							<td width="25%" bgcolor="#CCCCCC">Date of Joining(YYYY-MM-DD):</td>
							<td width="25%"><input type="text" id="doj" name="doj"></td>
							<td width="25%" bgcolor="#CCCCCC">Photo:</td>
							<td width="25%"><input type="file" name="Photo" size="2000000"
								accept="image/gif, image/jpeg, image/x-ms-bmp, image/x-png"
								size="26" required></td>

						</tr>
						<tr>
							<td bgcolor="#CCCCCC">Password:</td>
							<td><input type="password" name="pwd1" required
								maxlength="10" /></td>
							<td bgcolor="#CCCCCC">Re enter Password:</td>
							<td><input type="password" name="pwd2" required
								maxlength="10" /></td>
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
	$( "#doj" ).datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:"yy-mm-dd"
	}); 
});
</script>
</body>
</html>