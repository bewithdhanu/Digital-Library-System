<html>
<head>
<title>Digital Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php 
session_start ();
require_once '../db.php';require_once '../functions.php';
if (! isset ( $_SESSION ['admin_id'] )||isAdminLoginSessionExpired()) {
	header ( 'location:../admin.php' );
}
?>
</head>

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
						<td align="center"><a onClick="window.print()" class="a1">Print</a></td>
						<td align="right"><a href="index.php" class="a1">HOME</a></td>
						<td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td align="center" bgcolor="#999999">View Profile</td>
		</tr>
	</table>
	<form autocomplete="off" id="form1" name="form1" method="post" action="">
		<table width="40%" border="1" align="center">
			<tr>
				<td>ID:</td>
				<td><input name="id" type="text" id="id" /></td>
			</tr>
			<tr>
				<td colspan="2" align="right"><input type="submit" name="submit"
					id="submit" value="Submit" /> <input type="reset" name="reset"
					id="reset" value="Reset" /></td>
			</tr>
		</table>
	</form>
<?php
require_once '../db.php';
// require_once '../functions.php';
$type = "";
// bool set_time_limit (10);
$form = $_SERVER ['REQUEST_METHOD'];
if ($form == 'POST') {
	$id = $_POST ["id"];
	$sql = "SELECT * from u490995680_lms.login where id='$id' and status='on'";
	$result = mysqli_query ( $conn, $sql );
	
	while ( $row = mysqli_fetch_assoc ( $result ) ) {
		$type = $row ["type"];
	}
	mysqli_free_result ( $result );
	
	if ($type == "student") {
		$sql="select * from u490995680_lms.students where id='$id'";
		$result=mysqli_query($conn, $sql);
		while($row=mysqli_fetch_assoc($result)){
		?>
<table width="50%" border="0" align="center">
  <tbody>
    <tr>
      <td>ID:</td>
      <td><?php echo $row["id"]?></td>
      <td width="40%" rowspan="11" align="right" valign="top">Photo:<br><img src="<?php $path=$row["photo"];if(substr($path,0,3)=="../")echo $path; else echo "../".$path;?>" width="150" hight="250"/></td>
    </tr>
    <tr>
      <td width="20%">Name:</td>
      <td width="40%"><?php echo $row["name"]?></td>
    </tr>
    <tr>
      <td>Father Name:</td>
      <td><?php echo $row["fname"]?></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><?php echo $row["email"]?></td>
    </tr>
    <tr>
      <td>Gender:</td>
      <td><?php echo $row["gender"]?></td>
    </tr>
    <tr>
      <td>Date of Birth:</td>
      <td><?php echo $row["doj"]?></td>
    </tr>
    <tr>
      <td>Course:</td>
      <td><?php echo $row["course"]?></td>
    </tr>
    <tr>
      <td>Branch:</td>
      <td><?php echo $row["branch"]?></td>
    </tr>
    <tr>
      <td>Date of Join:</td>
      <td><?php echo $row["doj"]?></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><?php echo $row["address"]?></td>
    </tr>
    <tr>
      <td>Mobile:</td>
      <td><?php echo $row["mobile"]?></td>
    </tr>
  </tbody>
</table>
<?php
		}
		mysqli_free_result($result);
	} elseif ($type == "staff") {
		$sql="select * from u490995680_lms.staff where id='$id'";
		$result=mysqli_query($conn, $sql);
		while($row=mysqli_fetch_assoc($result)){
		?>
<table width="50%" border="0" align="center">
  <tbody>
    <tr>
      <td width="20%">ID:</td>
      <td width="40%"><?php echo $row["id"]?></td>
      <td width="40%" rowspan="7" align="right" valign="top"><p>Photo:<br><img src="<?php $path=$row["photo"];if(substr($path,0,3)=="../")echo $path; else echo "../".$path;?>" width="150" hight="250"/></p></td>
    </tr>
    <tr>
      <td>Name:</td>
      <td><?php echo $row["name"]?></td>
    </tr>
    <tr>
      <td>Email:</td>
      <td><?php echo $row["email"]?></td>
    </tr>
    <tr>
      <td>Designation:</td>
      <td><?php echo $row["desg"]?></td>
    </tr>
    <tr>
      <td>Address:</td>
      <td><?php echo $row["address"]?></td>
    </tr>
    <tr>
      <td>Mobile:</td>
      <td><?php echo $row["mobile"]?></td>
    </tr>
    <tr>
      <td>Date of Join</td>
      <td><?php echo $row["doj"]?></td>
    </tr>
  </tbody>
</table>
<?php
		}
		mysqli_free_result($result);
	} else {
		?>
	<table class="warning" border=0 align="center">
		<tr>
			<td>Id does not exist try another</td>
		</tr>
	</table>
<?php
	}
}

?>
</body>
</html>