<?php
function isLoginSessionExpired() {
	$login_session_duration = 60*30;
	$current_time = time ();
	if (isset ( $_SESSION ["user_id"] ) and isset ( $_SESSION ["user_type"] )) {
		if (((time () - $_SESSION ["loggedin_time"]) > $login_session_duration)) {
			unset ( $_SESSION ["user_id"] );
			unset ( $_SESSION ["user_type"] );
			
			return true;
		}
	}
	
	return false;
}
function isAdminLoginSessionExpired() {
	$login_session_duration = 60*60*4;
	$current_time = time ();
	if (isset ( $_SESSION ["admin_id"] ) and isset ( $_SESSION ["admin_type"] )) {
		if (((time () - $_SESSION ["admin_loggedin_time"]) > $login_session_duration)) {
			unset ( $_SESSION ["id"] );
			unset ( $_SESSION ["type"] );
			
			return true;
		}
	}
	
	return false;
}
function isForgetSessionExpired() {
	$login_session_duration = 5;
	$current_time = time ();
	if (isset ( $_SESSION ["user_id"] ) and isset ( $_SESSION ["user_type"] )) {
		if (((time () - $_SESSION ["forget_time"]) > $login_session_duration)) {
			unset ( $_SESSION ["forget_id"] );
			unset ( $_SESSION ["forget_type"] );
			
			return true;
		}
	}
	return false;
}
function isAdminForgetSessionExpired() {
	$login_session_duration = 5;
	$current_time = time ();
	if (isset ( $_SESSION ["admin_forget_id"] ) and isset ( $_SESSION ["admin_forget_type"] )) {
		if (((time () - $_SESSION ["admin_forget_time"]) > $login_session_duration)) {
			unset ( $_SESSION ["admin_forget_id"] );
			unset ( $_SESSION ["admin_forget_type"] );
			
			return true;
		}
	}
	
	return false;
}
function isValidAdmin($un, $pd) {
	global $conn;
	$sql = "SELECT IF(COUNT(*) >0, TRUE,FALSE)as response from u490995680_lms.admin where id='$un' AND pswrd='$pd'";
	$result = mysqli_query ( $conn, $sql );
	$a = 0;
	if (mysqli_num_rows ( $result ) > 0) {
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			if ($row ["response"] == 1) {
				$a ++;
			}
		}
	}
	
	if ($a > 0) {
		
		return true;
	} else {
		
		return false;
	}
}
function isValidIDPwd($un, $pd) {
	global $conn;
	$sql = "SELECT IF(COUNT(*) >0, TRUE,FALSE)as response from u490995680_lms.login where id='$un' AND pswrd='$pd'";
	$result = mysqli_query ( $conn, $sql );
	$a = 0;
	if (mysqli_num_rows ( $result ) > 0) {
		while ( $row = mysqli_fetch_assoc ( $result ) ) {
			if ($row ["response"] == 1) {
				$a ++;
			}
		}
	}

	if ($a > 0) {

		return true;
	} else {

		return false;
	}
}
function isValidBorrower($tab, $id) {
	global $conn;
	if ($tab == "login") {
		$sql = "SELECT IF(COUNT(*) >0, TRUE,FALSE)as response from u490995680_lms.login where id='$id' AND status='on'";
		$result = mysqli_query ( $conn, $sql );
		$b = 0;
		if (mysqli_num_rows ( $result ) > 0) {
			while ( $row1 = mysqli_fetch_assoc ( $result ) ) {
				if ($row1 ["response"] == 1) {
					$b ++;
				}
			}
		}
		
		if ($b > 0) {
			
			return true;
		} else {
			
			return false;
		}
	} elseif ($tab == "students") {
		$sql = "SELECT IF(COUNT(*) >0, TRUE,FALSE)as response from u490995680_lms.$tab where id='$id'";
		$result = mysqli_query ( $conn, $sql );
		$b = 0;
		if (mysqli_num_rows ( $result ) > 0) {
			while ( $row1 = mysqli_fetch_assoc ( $result ) ) {
				if ($row1 ["response"] == 1) {
					$b ++;
				}
			}
		}
		
		if ($b > 0) {
			
			return true;
		} else {
			
			return false;
		}
	} elseif ($tab == "staff") {
		$sql = "SELECT IF(COUNT(*) >0, TRUE,FALSE)as response from u490995680_lms.$tab where id='$id'";
		$result = mysqli_query ( $conn, $sql );
		$b = 0;
		if (mysqli_num_rows ( $result ) > 0) {
			while ( $row1 = mysqli_fetch_assoc ( $result ) ) {
				if ($row1 ["response"] == 1) {
					$b ++;
				}
			}
		}
		
		if ($b > 0) {
			
			return true;
		} else {
			
			return false;
		}
	} else {
		
		return false;
	}
}
function isIDExist($id) {
	global $conn;
	$chec1 = "SELECT * from u490995680_lms.login where id='$id'";
	$result1 = mysqli_query ( $conn, $chec1 );
	$c = 0;
	$stat="";
	if (mysqli_num_rows ( $result1 ) > 0) {
		while ( $row1 = mysqli_fetch_assoc ( $result1 ) ) {
			if (!strcmp($row1 ["id"],$id)) {
				$stat=$row1["status"];
				$c++;
			}
		}
	}
	if ($c > 0) {
		return $stat;
	} else {
		return "false";
	}
}
function isCardAvaliable($id, $card, $type) {
	global $conn;
	if($type=="student")
	$chec1 = "SELECT * from u490995680_lms.cards where id='$id' AND $card='0'";
	elseif($type=="staff")
	$chec1 = "SELECT * from u490995680_lms.scards where id='$id' AND $card='0'";
	$result1 = mysqli_query ( $conn, $chec1 );
	$c = 0;
	if (mysqli_num_rows ( $result1 ) > 0) {
		while ( $row1 = mysqli_fetch_assoc ( $result1 ) ) {
			if ($row1 [$card] == 0) {
				$c ++;
			}
		}
	}
	
	if ($c > 0) {
		
		return true;
	} else {
		
		return false;
	}
}
function isValidCall($call,$stat) {
	global $conn;
	$chec1 = "SELECT IF(COUNT(*) >0, TRUE,FALSE)as response from u490995680_lms.books where CAL='$call' AND status='$stat'";
	$result1 = mysqli_query ( $conn, $chec1 );
	$e = 0;
	if (mysqli_num_rows ( $result1 ) > 0) {
		while ( $row1 = mysqli_fetch_assoc ( $result1 ) ) {
			if ($row1 ["response"] == 1) {
				$e ++;
			}
		}
	}
	
	if ($e > 0) {
		
		return true;
	} else {
		
		return false;
	}
}
function isValidISBN($call,$stat) {
	global $conn;
	$chec1 = "SELECT IF(COUNT(*) >0, TRUE,FALSE)as response from u490995680_lms.books where ISBN='$call' AND status='$stat'";
	$result1 = mysqli_query ( $conn, $chec1 );
	$e = 0;
	if (mysqli_num_rows ( $result1 ) > 0) {
		while ( $row1 = mysqli_fetch_assoc ( $result1 ) ) {
			if ($row1 ["response"] == 1) {
				$e ++;
			}
		}
	}

	if ($e > 0) {

		return true;
	} else {

		return false;
	}
}
function isValidAcc($acc,$stat) {
	global $conn;
	$chec1 = "SELECT IF(COUNT(*) >0, TRUE,FALSE)as response from u490995680_lms.books where ACC='$acc' AND status='$stat'";
	$result1 = mysqli_query ( $conn, $chec1 );
	$e = 0;
	if (mysqli_num_rows ( $result1 ) > 0) {
		while ( $row1 = mysqli_fetch_assoc ( $result1 ) ) {
			if ($row1 ["response"] == 1) {
				$e ++;
			}
		}
	}
	
	if ($e > 0) {
		
		return true;
	} else {
		
		return false;
	}
}
function isBookAvail($acc) {
	global $conn;
	$chec1 = "SELECT IF(COUNT(*) >0, TRUE,FALSE)as response from u490995680_lms.books where ACC='$acc' AND status='0'";
	$result1 = mysqli_query ( $conn, $chec1 );
	$e = 0;
	if (mysqli_num_rows ( $result1 ) > 0) {
		while ( $row1 = mysqli_fetch_assoc ( $result1 ) ) {
			if ($row1 ["response"] == 1) {
				$e ++;
			}
		}
	}
	
	if ($e > 0) {
		return true;
	} else {
		return false;
	}
}
function getBookDetail($acc,$col){
	global $conn;
	$sql="select * from u490995680_lms.books where ACC='$acc'";
	$result1 = mysqli_query ( $conn, $sql );
	$e = 0;
	if (mysqli_num_rows ( $result1 ) > 0) {
		while ( $row = mysqli_fetch_assoc ( $result1 ) ) {
			$e=$row[$col];
		}
	}
	return $e;
}
function isBookAvailIssues($acc,$id) {
	global $conn;
	$type=getIDType($id);
	$isbn=getBookDetail(0, "ISBN");
	if($type=="staff")
	$chec1 = "SELECT IF(COUNT(*) >0, TRUE,FALSE)as response from u490995680_lms.scards where T1='$acc' OR T2='$acc' OR T3='$acc' OR T4='$acc' OR T5='$acc' OR T6='$acc'";
	elseif($type=="student")
	$chec1 = "SELECT IF(COUNT(*) >0, TRUE,FALSE)as response from u490995680_lms.cards where T1='$acc' OR T2='$acc' OR T3='$acc' OR RT='$acc'";
	$result1 = mysqli_query ( $conn, $chec1 );
	$e = 0;
	if (mysqli_num_rows ( $result1 ) > 0) {
		while ( $row1 = mysqli_fetch_assoc ( $result1 ) ) {
			if ($row1 ["response"] == 1) {
				$e ++;
			}
		}
	}
	
	if ($e > 0) {
		return true;
	} else {
		return false;
	}
}
function addBook($val) {
	global $conn;
	$count = $val [15];
	$sql = "";
	for($i = 0; $i < $count; $i ++) {
		$sql = $sql . "insert into u490995680_lms.books (`DOB`, `BILL`, `CAL`, `TITL`, `AUT`, `POP`, `NOP`, `YOP`, `SUB`, `EDTN`, `VOL`, `ISBN`, `PAG`, `PRC`, `RMRK`, `status`) values('$val[0]','$val[1]','$val[2]','$val[3]','$val[4]','$val[5]','$val[6]','$val[7]','$val[8]','$val[9]','$val[10]','$val[11]','$val[12]','$val[13]','$val[14]','0');";
	}
	if (mysqli_multi_query ( $conn, $sql )) {
		
		return true;
	} else {
		
		return false;
	}
}
function makeTransIdFor($tr) {
	return $tr . round ( microtime ( true ) * 1000 );
	;
}
function issueBooks($uq, $id, $card, $acc, $asst, $type) {
	global $conn;
	$dt=date("Y-m-d");
	$sql = "INSERT INTO `u490995680_lms`.`issues` VALUES ('$uq', '$id', '$card', '$acc', '$dt', '$asst','1111-11-11','');";
	$sql = $sql . "UPDATE `u490995680_lms`.`books` SET `status`='$id' WHERE  `ACC`='$acc';";
	if($type=="student")
	$sql = $sql . "UPDATE `u490995680_lms`.`cards` SET `$card`='$acc' WHERE  `ID`='$id';";
	elseif($type=="staff")
	$sql = $sql . "UPDATE `u490995680_lms`.`scards` SET `$card`='$acc' WHERE  `ID`='$id';";
	if (mysqli_multi_query ( $conn, $sql )) {
		return true;
	} else {
		return false;
	}
}
function returnBooks($tid, $ra, $acc, $id, $card, $type) {
	global $conn;
	$dt=date("Y-m-d");
	$sql = "UPDATE `u490995680_lms`.`issues` SET `dor`='$dt', `RA`='$ra' WHERE  `tid`='$tid';";
	$sql = $sql . "UPDATE `u490995680_lms`.`books` SET `status`='0' WHERE  `ACC`='$acc';";
	if($type=="student")
	$sql = $sql . "UPDATE `u490995680_lms`.`cards` SET `$card`='0' WHERE  `ID`='$id';";
	elseif($type=="staff")
	$sql = $sql . "UPDATE `u490995680_lms`.`scards` SET `$card`='0' WHERE  `ID`='$id';";
	if (mysqli_multi_query ( $conn, $sql )) {
		return true;
	} else {
		return false;
	}
}
function addFine($tid, $id, $itid, $acc,$fine, $new, $date, $asst) {
	global $conn;
	$sql = "insert into u490995680_lms.fines values('$tid','$id','$itid','$acc','$fine','$new','$date','$asst','0')";
	if (mysqli_multi_query ( $conn, $sql )) {
		return true;
	} else {
		return false;
	}
}
function renewBooks($tid, $ra, $acc, $id, $card) {
	global $conn;
	$dt=date("Y-m-d");
	$uq = makeTransIdFor ( "LI" );
	$sql = "UPDATE `u490995680_lms`.`issues` SET `dor`='$dt', `RA`='$ra' WHERE  `tid`='$tid';";
	$sql = $sql . "UPDATE `u490995680_lms`.`books` SET `status`='0' WHERE  `ACC`='$acc';";
	$sql = $sql . "UPDATE `u490995680_lms`.`cards` SET `$card`='0' WHERE  `ID`='$id';";
	$sql = $sql . "INSERT INTO `u490995680_lms`.`issues` VALUES ('$uq', '$id', '$card', '$acc', '$dt', '$ra','1111-11-11','');";
	$sql = $sql . "UPDATE `u490995680_lms`.`books` SET `status`='$id' WHERE  `ACC`='$acc';";
	$sql = $sql . "UPDATE `u490995680_lms`.`cards` SET `$card`='$acc' WHERE  `ID`='$id';";
	if (mysqli_multi_query ( $conn, $sql )) {
		return true;
	} else {
		return false;
	}
}
function getTitle($acc){
	global $conn;
	$sql="select * from u490995680_lms.books where ACC='$acc'";
	$result1 = mysqli_query ( $conn, $sql );
	$e = 0;
	if (mysqli_num_rows ( $result1 ) > 0) {
		while ( $row = mysqli_fetch_assoc ( $result1 ) ) {
				$e=$row["TITL"];
		}
	}
	return $e;
}
function calculateFine($type,$days){
	if($type=="staff"){
		return 0;
	}elseif($type=="student"){
		if($days<=10)
			return 0;
		elseif($days<40&&$days>10)
			return $days-10;
		elseif($days>40)
			return ($days-10)*2;
	}
}
function getIDType($id){
	global $conn;
	$sql="select * from u490995680_lms.login where ID='$id'";
	$result1 = mysqli_query ( $conn, $sql );
	$e = 0;
	if (mysqli_num_rows ( $result1 ) > 0) {
		while ( $row = mysqli_fetch_assoc ( $result1 ) ) {
			$e=$row["type"];
		}
	}
	return $e;
}
?>