<?php

include "DBConnect.php";



$conn = openConnect();


$fromArray = array('"', '\'', '&'. '(', ')', '|');
$toArray = array('', '', '', '', '', '');

#Game Shit

$gameQuery = 'select distinct Publisher from Games';
$result = $conn->query($gameQuery);
while ( $row = $result->fetch_assoc() ) {
	$stripped = str_replace($fromArray,$toArray,$row['Publisher']);
	echo "$('.pubGroup').append('<option value=\"publisher : " . $stripped . "\">Publisher : " . $stripped . " </option>');";

}

$gameQuery = 'select distinct user_rating from Games';
$result = $conn->query($gameQuery);


while ( $row = $result->fetch_assoc() ) {
	
	$stripped = str_replace($fromArray,$toArray,$row['user_rating']);
	echo "$('.urGroup').append('<option value=\"user rating : " . $stripped . "\">User Rating : " . $stripped . " </option>');";

}
?>