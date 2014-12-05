<?php

include "DBConnect.php";



$conn = openConnect();


$fromArray = array('"', '\'', '&'. '(', ')', '|');
$toArray = array('', '', '', '', '', '');

#Game Shit

$gameQuery = 'select distinct web_rating from FinalGames';
$result = $conn->query($gameQuery);
while ( $row = $result->fetch_assoc() ) {
	$stripped = str_replace($fromArray,$toArray,$row['web_rating']);
	echo "$('.webGroup').append('<option value=\"web rating : " . $stripped . "\">Web Rating : " . $stripped . " </option>');";
}


?>
