<?php
$servername = "SERVER NAME";
$username = "USER NAME";
$password = "PASSWORD";
$dbname = "DATABASE";
// Create connection
$conn = mysqli_connect ( $servername, $username, $password, $dbname );
// Check connection
if (! $conn) {
	die ( "Connection failed: " . mysqli_connect_error () );
}
?>
