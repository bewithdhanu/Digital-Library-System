<?php
$servername = "mysql.hostinger.in";
$username = "u490995680_dhanu";
$password = "Dhanu@1995";
$dbname = "u490995680_lms";
// Create connection
$conn = mysqli_connect ( $servername, $username, $password, $dbname );
// Check connection
if (! $conn) {
	die ( "Connection failed: " . mysqli_connect_error () );
}
?>