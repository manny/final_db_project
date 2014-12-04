<?php

include "DBConnect.php";



$conn = openConnect();


$fromArray = array('"', '\'', '&'. '(', ')', '|');
$toArray = array('', '', '', '', '', '');

#Game Shit

$gameQuery = 'select distinct Genres from FinalGames';
$result = $conn->query($gameQuery);
while ( $row = $result->fetch_assoc() ) {
	$stripped = str_replace($fromArray,$toArray,$row['Genres']);
	echo "$('.titleGroup').append('<option value=\"genres: " . $stripped . "\">Genres : " . $stripped . " </option>');";

}


?>
