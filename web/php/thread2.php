<?php

include "DBConnect.php";



$conn = openConnect();


$fromArray = array('"', '\'', '&'. '(', ')', '|');
$toArray = array('', '', '', '', '', '');

#Game Shit

$gameQuery = 'select distinct web_rating from Games';
$result = $conn->query($gameQuery);
while ( $row = $result->fetch_assoc() ) {
	$stripped = str_replace($fromArray,$toArray,$row['web_rating']);
	echo "$('.webGroup').append('<option value=\"web rating : " . $stripped . "\">Web Rating : " . $stripped . " </option>');";
}

$gameQuery = 'select distinct Developer from Games';
$result = $conn->query($gameQuery);


while ( $row = $result->fetch_assoc() ) {
	$stripped = str_replace($fromArray,$toArray,$row['Developer']);
	echo "$('.devGroup').append('<option value=\"developer : " . $stripped . "\">Developer : " . $stripped . " </option>');";


}
?>
