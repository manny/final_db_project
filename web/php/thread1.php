<?php

include "DBConnect.php";



$conn = openConnect();


$fromArray = array('"', '\'', '&'. '(', ')', '|');
$toArray = array('', '', '', '', '', '');

#Game Shit


$gameQuery = 'select distinct esrb from FinalGames';
$result = $conn->query($gameQuery);


while ( $row = $result->fetch_assoc() ) {
	$stripped = str_replace($fromArray,$toArray,$row['esrb']);
	echo "$('.webGroup').append('<option value=\"esrb : " . $stripped . "\">ESRB : " . $stripped . " </option>');";


}
?>
