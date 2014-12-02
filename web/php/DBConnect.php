<?php
#mysql_set_charset('utf8');

function openConnect() {
	$conn = new mysqli("104.131.178.40", "user", "password", "GameDB", 3306);
	if ($conn->connect_error) {
		die("Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error);
	}
	return $conn;
}

function isConOpen($SQLConnect) {
	if($SQLConnect->connect_error) {
		return False;
	}
	return True;
}

function closeConnect($SQLConnect) {
	$SQLConnect->close();

}



?>
