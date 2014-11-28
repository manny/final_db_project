<?php

function openConnect() {
	$conn = new mysqli("104.131.178.40", "user", "password", "GameDB", 3306);
	if ($conn->connect_error) {
		die("Error: Fail to connect to db");
	}

	return $conn;
}

function isConOepn($SQLConnect) {
	if($SQLConnect->connect_error) {
		return False;
	}
	return True;
}

function closeConnect($SQLConnect) {
	$SQLConnect->close();

}



?>
