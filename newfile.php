 <table width="100%" border="1">
		<tr align="center" bgcolor="sky blue">
			<td width="20%">Transaction Id</td>
			<td width="20%">Borrower Id</td>
			<td width="20%">Card</td>
			<td width="20%">Account No</td>
			<td width="20%">Asst Initial</td>
		</tr>
<?php
require_once 'functions.php';require_once 'db.php';
	$sql = "select *from u490995680_lms.issues LIMIT 5;";
	echo $sql;
	$result = mysqli_query ( $conn, $sql );
	while ( mysqli_num_rows ( $result ) > 0 ) {
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			?>		
		<tr>
			<td><?php echo $row["tid"];?></td>
			<td><?php echo $row["id"];?></td>
			<td><?php echo $row["card"];?></td>
			<td><?php echo $row["acc"];?></td>
			<td><?php echo $row["asst"];?></td>
		</tr>
<?php
		}
	}
	mysqli_close($conn);
	?>
	</table>