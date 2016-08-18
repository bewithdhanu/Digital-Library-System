<?php
if ($_GET ["search"] == "" || ! isset ( $_GET ["search"] ))
	header ( "location:Search Books.php" );
else
	$res = $_GET ["search"];
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Digital Library System</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<?php
session_start ();
require_once '../db.php';
require_once '../functions.php';
if (! isset ( $_SESSION ['user_id'] ) || isLoginSessionExpired ()||$_SESSION["user_type"]!="student") {
	header ( 'location:../index.php' );
}
?>
</head>

<body>
	<table width="100%" border="0">
		<tr>
			<td colspan="2" align="center" valign="middle" class="head">Digital
				Library System
				<p class="sub_head">Sri Venkateswara College of
					Engineering,Etcherlla</p>
			</td>
		</tr>
		<tr>
			<td colspan="2"><table width="100%" border="0" align="right"
					cellpadding="5">
					<tr>
						<td align="left">Welcome::<?php echo $_SESSION["user_id"];?></td>
						<td align="center"><a onClick="window.print()" class="a1">Print</a></td>
						<td align="right"><a href="index.php" class="a1">HOME</a></td>
						<td align="right"><a href="../logout.php" class="a1">LOGOUT</a></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td colspan="2" align="center">&nbsp;</td>
		</tr>

		<tr>
			<td width="15%" align="center">
		
		</tr>
	</table>
	<form autocomplete="off" name="form1" method="post" action="">
		<h6>
			<label for="textfield"></label>
		</h6>
		<table width="100%" border="0">
			<tr>
				<td align="left" valign="middle"><img src="../images/title.png"
					width="200" height="32" alt="One Sreach" /></td>
				<td width="100%" align="left" valign="middle"><input name="search"
					type="text" class="search" id="textfield"
					placeholder="Search With: Title | Author | Acc No | ISBN "
					value="<?php echo $res;?>" /> <input name="Submit" type="submit"
					class="button" id="Submit" value="Search" /></td>
			</tr>
			<tr>
				<td colspan="2" align="center" valign="middle">&nbsp;</td>
			</tr>
		</table>
		<?php 
		$count=0;
		$sql = "select count(acc) as count from u490995680_lms.books where TITL LIKE  '%$res%' OR Aut LIKE '%$res%' OR isbn LIKE '%$res%' OR acc LIKE '%$res%'";
		$result = mysqli_query ( $conn, $sql );
		if (mysqli_num_fields ( $result ) > 0) {
			while ( $row = mysqli_fetch_assoc ( $result ) ) {
				$count=$row["count"];
			}
		}
		echo "<div align=left>$count results are found</div>";
		mysqli_free_result($result);
		?>
		<table width="100%" border="0">
			<tr>
				<td>
					<table class="dtable" style="overflow-x: auto">
						<tr class="dtr">
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
							<th class="dth">Action</th>
						</tr>
							<?php
							if (isset ( $_POST ["Submit"] )) {
								$res = $_POST ["search"];
								header ( "location:res.php?search=$res" );
							}
							
							$sql = "select *from u490995680_lms.books where TITL LIKE  '%$res%' OR Aut LIKE '%$res%' OR isbn LIKE '%$res%' OR acc LIKE '%$res%' GROUP BY ISBN";
							$result = mysqli_query ( $conn, $sql );
							if (mysqli_num_fields ( $result ) > 0) {
								while ( $row = mysqli_fetch_assoc ( $result ) ) {
									?>
						<tr class="dtr">
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
							<td class="dtd">
								<a target="_blank" href="ISBNSearch.php?ISBN=<?php echo $row["ISBN"];?>" class="a1">select</a>
							</td>
						</tr>
						      <?php
								}
								echo "<tr class=\"dtr\"><td colspan=11 class=\"dtd\"><center>No more results avaliable!</center></td></tr>";
							}
							?>
						    </table>
				</td>
			</tr>
		</table>
	</form>

	<!-- 	<table class="message" width="100%"><tr><td align="center"><h4>This Advanced OneSearch is under process of construction</h4></td></tr></table> -->
</body>
</html>