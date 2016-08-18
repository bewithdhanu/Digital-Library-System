<?php
session_start ();
require_once '../db.php';
require_once '../functions.php';
if (! isset ( $_SESSION ['user_id'] ) || isLoginSessionExpired ()||$_SESSION["user_type"]!="staff") {
	header ( 'location:../index.php' );
}
?>
<html>
<head>
<title>Digital Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<link href="../JQuery/jQueryAssets/jquery.ui.core.min.css"
	rel="stylesheet" type="text/css">
<link href="../JQuery/jQueryAssets/jquery.ui.theme.min.css"
	rel="stylesheet" type="text/css">
<link href="../JQuery/jQueryAssets/jquery.ui.datepicker.min.css"
	rel="stylesheet" type="text/css">
<script src="../JQuery/jQueryAssets/jquery-1.8.3.min.js"
	type="text/javascript"></script>
<script
	src="../JQuery/jQueryAssets/jquery-ui-1.9.2.datepicker.custom.min.js"
	type="text/javascript"></script>
</head>
<body>
	<table width="100%" border="0">
		<tr>
			<td colspan="6" align="center" valign="middle" class="head">Digital
				Library System
				<p class="sub_head">Sri Venkateswara College of
					Engineering,Etcherlla</p>
			</td>
		</tr>
		<tr>
			<td colspan="6"><table width="100%" border="0" align="right"
					cellpadding="5">
					<tr>
						<td align="left">Welcome::<?php echo $_SESSION["user_id"];?></td>
						<td align="left"><a onClick="window.print()" class="a1">Print</a></td>
						<td align="right"><a href="index.php" class="a1">HOME</a></td>
						<td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td colspan="6" align="center" bgcolor="#999999">Library Transactions</td>
		</tr>
		<tr>
			<td width="15%">&nbsp;</td>
			<td width="15%">&nbsp;</td>
			<td width="20%">&nbsp;</td>
			<td width="15%">&nbsp;</td>
			<td width="20%">&nbsp;</td>
			<td width="15%">&nbsp;</td>
		</tr>
	</table>
	<form autocomplete="off" name="form1" method="POST">
		<table width="100%" border="0">
			<tr>
				<td width="15%">&nbsp;</td>
				<td bgcolor="#CCCCCC">Type of Transactions:</td>
				<td><label for="select"></label>
				  <select name="altrtype"
					id="altrtype" >
				    <option value="All">All</option>
				    <option value="LI">Issue</option>
				    <option value="LR">Return</option>
			      </select></td>
				<td width="18%" bgcolor="#CCCCCC">&nbsp;</td>
				<td width="17%">&nbsp;</td>
				<td width="15%">&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td bgcolor="#CCCCCC">From Date:</td>
				<td><input type="text" id="Datepicker1" name="altrdt1" required value="<?php echo date("Y-m-d");?>"></td>
				<td bgcolor="#CCCCCC">To Date:</td>
				<td><input type="text" id="Datepicker2" name="altrdt2" required value="<?php echo date("Y-m-d");?>"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td colspan="4" align="right"><input type="submit" name="Submit"
					id="Submit" value="Submit"> <input type="reset" name="button2"
					id="button2" value="Reset"></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
			  <td>&nbsp;</td>
			  <td colspan="4" style="color: #5F2F6A"><h5><li>Leaving empty means it considers as ALL AVAILABALE details</li>
			  </h5></td>
			  <td>&nbsp;</td>
		  </tr>
		</table>
		<p>&nbsp;</p>
</form>
<?php
	$form = $_SERVER ['REQUEST_METHOD'];
	if (!empty($_POST["Submit"])){
		$altrid=$_SESSION["user_id"];
		$altrtype=$_POST["altrtype"];
		$altrdt1=$_POST["altrdt1"];
		$altrdt2=$_POST["altrdt2"];
		if($altrtype=="All"){
			echo "Issue/Returns:";
			issuereturn($altrid, $altrdt1, $altrdt2);
		}elseif($altrtype=="LI"||$altrtype=="LR"){
			issuereturn($altrid, $altrdt1, $altrdt2);
		}
	}
?>

<?php 
function issuereturn($id,$fdt,$tdt){
	global $conn;
	$sql="select *from u490995680_lms.issues where id like '%$id%' AND doi between '$fdt' AND '$tdt'";
	$result=mysqli_query($conn, $sql);
?>
	<table class="dtable" style="overflow-x: auto">
		<tr class="dtr">
			<th class="dth">Transaction Id</th>
			<th class="dth">Borrower ID</th>
			<th class="dth">Card</th>
			<th class="dth">Acc No</th>
			<th class="dth">Date of Issue</th>
			<th class="dth">Issueing Authority</th>
			<th class="dth">Date of Return</th>
			<th class="dth">Returning Authority</th>
		</tr>
<?php 	
	while($row=mysqli_fetch_assoc($result)){
?>
		<tr class="dtr">
			<td class="dtd"><?php echo $row["tid"]?></td>
			<td class="dtd"><?php echo $row["id"]?></td>
			<td class="dtd"><?php echo $row["card"]?></td>
			<td class="dtd"><?php echo $row["acc"]?></td>
			<td class="dtd"><?php echo $row["doi"]?></td>
			<td class="dtd"><?php echo $row["IA"]?></td>
			<td class="dtd"><?php echo $row["dor"]?></td>
			<td class="dtd"><?php echo $row["RA"]?></td>
		</tr>	
<?php 		
	}
	echo "</table>";
	mysqli_free_result($result);
} 
?>

<script type="text/javascript">
$(function() {
	$( "#Datepicker1" ).datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:"yy-mm-dd"
	}); 
});
$(function() {
	$( "#Datepicker2" ).datepicker({
		changeMonth:true,
		changeYear:true,
		dateFormat:"yy-mm-dd"
	}); 
});
</script>
</body>
</html>