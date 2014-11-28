<?php

include "DBConnect.php";

function getPlayer($SQLConnection) {
	$res = $SQLConnection->query("SELECT * FROM PLAYERS");
	return $res;
}

function getGames($SQLConnection) {
	$res = $SQLConnection->query("SELECT * FROM GAMES");
	return $res;
}

function getPlayerByGender($SQLConnection) {
	$res = $SQLConnection->query("SELECT * FROM PLAYERS GROUP BY GENDER");
	return $res;
}

function getPlayerByRegion($SQLConnection) {
	$res = $SQLConnection->query("SELECT * FROM PLAYERS GROUP BY REGION");
	return $res;
}

function getPlayerByGenre($SQLConnection) {
	$res = $SQLConnection->query("SELECT * FROM PLAYERS GROUP BY PREFFERED_GENRE");
	return $res;
}

function getPlayerByIncome($SQLConnection) {
	$res = $SQLConnection->query("SELECT * FROM PLAYERS GROUP BY INCOME");
	return $res;
}

function getPlayerByMarital($SQLConnection) {
	$res = $SQLConnection->query("SELECT * FROM PLAYERS GROUP BY MARITAL_STATUS");
	return $res;
}

function getGamesByDeveloper($SQLConnection) {
	$res = $SQLConnection->query("SELECT * FROM GAMES GROUP BY DEVELOPER");
	return $res;
}

function getGamesByPublisher($SQLConnection) {
	$res = $SQLConnection->query("SELECT * FROM GAMES GROUP BY PUBLISHER");
	return $res;
}

function getGamesByGenre($SQLConnection) {
	$res = $SQLConnection->query("SELECT * FROM GAMES GROUP BY GENRE");
	return $res;
}

function getGamesByESRB($SQLConnection) {
	$res = $SQLConnection->query("SELECT * FROM GAMES GROUP BY ESRB");
	return $res;
}

function getGamesByRating($SQLConnection) {
	$res = $SQLConnection->query("SELECT * FROM GAMES GROUP BY WEB_RATING");
	return $res;
}

function getOther($SQLConnection, $SQLQuery) {
	$res = $SQLConnection->query($SQLQuery);
	return $res;
}

function printResult($SQLResult) {
	if($SQLResult->num_rows >0) {
		while($row = $SQLResult->fetch_assoc()) {
			echo $row;
		}

	}

}

?>
