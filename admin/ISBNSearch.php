<?php
if ($_GET ["ISBN"] == "" || ! isset ( $_GET ["ISBN"] ))
	header ( "location:Search Books.php" );
else
	$res = $_GET ["ISBN"];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Digital Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start ();
require_once '../db.php';
require_once '../functions.php';
if (! isset ( $_SESSION ['admin_id'] ) || isAdminLoginSessionExpired ()) {
	header ( 'location:../admin.php' );
}
?>
</head>

<body>
<table width="100%" border="0">
  <tr>
    <td align="center" valign="middle" class="head">Digital
      Library System
      <p class="sub_head">Sri Venkateswara College of
        Engineering,Etcherlla</p></td>
  </tr>
  <tr>
    <td><table width="100%" border="0" align="right"
					cellpadding="5">
      <tr>
        <td align="left">Welcome::<?php echo $_SESSION["admin_id"];?></td>
        <td align="center"><a onClick="window.print()" class="a1">Print</a></td>
        <td align="right"><a href="index.php" class="a1">HOME</a></td>
        <td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
      </tr>
    </table></td>
  </tr>
</table>
<table class="dtable" style="overflow-x: auto">
  <tr>
    <th class="dth">Acc No</th>
    <th class="dth">Call No</th>
    <th class="dth">Title</th>
    <th class="dth">Author</th>
    <th class="dth">ISBN</th>
    <th class="dth">Publication</th>
    <th class="dth">Year of Publish</th>
    <th class="dth">Edition</th>
    <th class="dth">Price</th>
    <th class="dth">Pages</th>
    <th class="dth">Remarks</th>
    <th class="dth">Status</th>
    <?php
							if (isset ( $_POST ["Submit"] )) {
								$res = $_POST ["search"];
								header ( "location:res.php?search=$res" );
							}
							$sql = "select * from u490995680_lms.books where ISBN=$res";
							$result = mysqli_query ( $conn, $sql );
							if (mysqli_num_fields ( $result ) > 0) {
								while ( $row = mysqli_fetch_assoc ( $result ) ) {
									?>
  <tr class="dtr">
    <td class="dtd"><?php echo $row["ACC"];?></td>
    <td class="dtd"><?php echo $row["CAL"];?></td>
    <td class="dtd"><a
								href="https://www.google.co.in/search?q=<?php echo $row["TITL"].",".$row["AUT"];?>"
								target="_blank" class="a1"><?php echo $row["TITL"];?></a></td>
    <td class="dtd"><?php echo $row["AUT"];?></td>
    <td class="dtd"><?php echo $row["ISBN"];?></td>
    <td class="dtd"><?php echo $row["NOP"];?></td>
    <td class="dtd"><?php echo $row["YOP"];?></td>
    <td class="dtd"><?php echo $row["EDTN"];?></td>
    <td class="dtd"><?php echo $row["PRC"];?></td>
    <td class="dtd"><?php echo $row["PAG"];?></td>
    <td class="dtd"><?php echo $row["RMRK"];?></td>
    <td class="dtd"><?php $sta=$row["status"];if($sta=="0")echo "Available";else echo $sta;?></td>
  </tr>
  <?php
								}
								echo "<tr class=\"dtr\"><td colspan=12 class=\"dtd\"><center>No more results avaliable!</center></td></tr>";
							}
							?>
</table>
</body>
</html>
