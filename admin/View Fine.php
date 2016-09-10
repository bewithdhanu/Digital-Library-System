<?php
if ($_GET ["ID"] == "" || ! isset ( $_GET ["ID"] ))
	header ( "location:Fine.php" );
else
	$res = $_GET ["ID"];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php session_start();
include_once '../db.php';
include_once '../functions.php';

if (! isset ( $_SESSION ['admin_id'] ) || isAdminLoginSessionExpired ()) {
	header ( 'location:../admin.php' );}
?></head>

<body>
<table width="100%" border="0">
  <tr>
    <td width="100%" align="center" valign="middle" class="head">Online Library System
      <p class="sub_head">Sri Venkateswara College of
        Engineering,Etcherlla</p></td>
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
    <td align="center" bgcolor="#999999">&nbsp;</td>
  </tr>
</table>
<form action="" method="post" name="form1" id="form1" autocomplete="off">
  <table class="dtd" align="center">
    <tbody>
      <tr class="dtr">
        <th scope="col" class="dth">Transaction ID</th>
        <th scope="col" class="dth">Issue Transaction ID</th>
        <th scope="col" class="dth">Acc No</th>
        <th class="dth" scope="col">Actual Fine</th>
        <th class="dth" scope="col">Status</th>
      </tr>
<?php 
$tf=0;$ptf=0;$stacktid=array();$stackfine=array();$payfine=array();
	$sql="select *from u490995680_lms.fines where ID='$res'";
	$result=mysqli_query($conn, $sql);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
?>      
      <tr class="dtr">
        <td class="dtd"><?php echo $row["tid"];?></td>
        <td class="dtd"><?php echo $row["itid"];?></td>
        <td class="dtd"><?php echo $row["acc"];?></td>
        <td class="dtd"><?php echo $row["fine"];?></td>
        <td class="dtd"><?php if($row["status"]==0)echo "Not paid"; elseif($row["status"]==1) echo "Paid";?></td>
      </tr>
<?php
if($row["status"]==0)
array_push($stacktid, $row["tid"]);
	}
}
mysqli_free_result($result);
?>      
      <tr class="dtr">
        <td class="dtd" colspan="4" style="text-align:right">&nbsp;</td>
        <td class="dtd" style="tex-align:right"><span class="dtd" style="text-align:right">
          <input type="submit" name="pay" id="pay" value="Pay Fine">
        </span></td>
      </tr>
    </tbody>
  </table>
  <p>&nbsp;</p>
</form>
<?php 
if(!empty($_POST["pay"])){
	$sql="";
	for($i=0;$i<count($stacktid);$i++){
		$sql=$sql."UPDATE `u490995680_lms`.`fines` SET `status`='1' WHERE  `tid`='$stacktid[$i]';";
	}
	if(mysqli_multi_query($conn, $sql)){
		echo "<table class=\"message\" align=center><tr><td class=\"dtd\"><center>Fine Paid sucessfully!</center></td></tr></table>";
	}else{
		echo "<table class=\"warning\" align=center><tr><td class=\"dtd\"><center>Fine does not paid some problem occured!</center></td></tr></table>";
	}
}
?>
</body>
</html>