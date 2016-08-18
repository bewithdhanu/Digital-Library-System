<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Digital Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php 
session_start ();
require_once '../db.php';require_once '../functions.php';
if (! isset ( $_SESSION ['user_id'] )||isLoginSessionExpired()||$_SESSION["user_type"]!="student") {
	header ( 'location:../index.php' );
}
?></head>

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
						<td align="left">Welcome::<?php echo $_SESSION["user_id"];?></td>
						<td align="center"><a onClick="window.print()" class="a1">Print</a></td>
						<td align="right"><a href="index.php" class="a1">HOME</a></td>
						<td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td align="center" bgcolor="#999999">View Status of Cards</td>
		</tr>
	</table>
<?php
$ad = $_SESSION ["user_id"];

	$id = $ad;
	$sql = "select *from u490995680_lms.cards where id='$id'";
	$result = mysqli_query ( $conn, $sql );
	$t1 = "";
	$t2 = "";
	$t3 = "";
	$rt = "";
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
				$t1 = $row ["T1"];
				$t2 = $row ["T2"];
				$t3 = $row ["T3"];
				$rt = $row ["RT"];
		}
	mysqli_free_result($result);
	?>
<form autocomplete="off" id="form2" name="form2" method="post" action="">
		<table width="60%" border="0" align="center">
			<tbody>
			<?php 
			$x=0;
			if($t1!="0"){
				$x=1;
				$value=getTitle($t1);
			}elseif($t1=="0"){
				$x=2;
				$value="Not issued";
			}
			?>
				<tr>
					<td bgcolor="#CCCCCC">TOKEN-I</td>
					<td><?php echo $value;?>
				</tr>
			<?php 
			$x=0;
			if($t2!="0"){
				$x=1;
				$value=getTitle($t2);
			}elseif($t2=="0"){
				$x=2;
				$value="Not issued";
			}
			?>
				<tr>
					<td bgcolor="#CCCCCC">TOKEN-II</td>
					<td><?php echo $value;?>
				</tr>
			<?php 
			$x=0;
			if($t3!="0"){
				$x=1;
				$value=getTitle($t3);
			}elseif($t3=="0"){
				$x=2;
				$value="Not issued";
			}
			?>
				<tr>
					<td bgcolor="#CCCCCC">TOKEN-III</td>
					<td><?php echo $value;?>
				</tr>
			<?php 
			$x=0;
			if($rt!="0"){
				$x=1;
				$value=getTitle($rt);
			}elseif($rt=="0"){
				$x=2;
				$value="Not issued";
			}
			?>
				<tr>
					<td bgcolor="#CCCCCC">Reference Token</td>
					<td><?php echo $value;?>
				</tr>
			</tbody>
		</table>
	</form>

</body>
</html>