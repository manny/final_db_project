
<?php

$out = "";
include 'DBConnect.php';

$conn = openConnect();

$num = $_POST['indexNum'];
$tag = $_POST['gamerTag'];


if ($num == 0) {
	$query = 'select Ethnicity,FinalPlayers.GivenName,FinalPlayers.Surname,City,State,Income,Marital_Status from FinalPlayers,FinalTags where FinalTags.GivenName=FinalPlayers.GivenName and FinalTags.Surname=FinalPlayers.Surname and FinalTags.ID='."'$tag'";
	$result = $conn->query($query);
	if (empty($result)) {
		echo "0";
		exit();
	}
	while ( $row = $result->fetch_assoc() ) {
		$out = 'Full name: ' . $row['GivenName'] . ' ' . $row['Surname'] . '</br>' . 'Ethnicity: ' . $row['Ethnicity'] . '</br>Location: ' . $row['City'] . ',' . $row['State'] . '</br> Income: ' . $row['Income'] . ' thousand per year </br> Relationship: ' . $row['Marital_Status'];
	}
	echo "$out";
	exit();
}
else if ($num == 3) {


	$friend = 'select * from FinalOwns, FinalTags where Game = Any(select distinct Game from FinalPlayers,FinalTags,FinalOwns where FinalTags.Tag='."'$tag'".' and FinalPlayers.GivenName=FinalTags.GivenName and FinalPlayers.Surname = FinalTags.Surname and FinalPlayers.GivenName = FinalOwns.First_Name and FinalOwns.Surname = FinalPlayers.Surname) and FinalTags.Tag='."'$tag'".' and FinalOwns.First_Name<>FinalTags.GivenName and FinalOwns.Surname<>FinalTags.Surname;';


	//$query = 'Select distinct title from TestGames g,Players,Owns where Players.GivenName='.$tag.' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title and g.web_rating+g.user_rating=(Select max(web_rating+user_rating) from TestGames g,Players,Owns where Players.GivenName='Samuel' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title)';
	$query = 'select distinct title from FinalGames g,FinalPlayers,FinalOwns,FinalTags where FinalPlayers.GivenName=FinalTags.GivenName and FinalPlayers.Surname=FinalTags.Surname and FinalTags.Tag='."'$tag'". ' and FinalOwns.First_Name=FinalPlayers.GivenName and g.Genres Like Concat("%",FinalPlayers.Preferred_Genre,"%") and FinalOwns.Game<>g.title and g.web_rating+g.user_rating=(Select max(web_rating+user_rating) from FinalGames g,FinalPlayers,FinalOwns,FinalTags where FinalPlayers.GivenName=FinalTags.GivenName and FinalPlayers.Surname=FinalTags.Surname and FinalTags.Tag='."'$tag'". ' and FinalOwns.First_Name=FinalPlayers.GivenName and g.Genres Like Concat("%",FinalPlayers.Preferred_Genre,"%") and FinalOwns.Game<>g.title)';
	$result = $conn->query($query);
	$owner = $conn->query($friend);
	if (empty($result)) {
		$out = $out.'There are no recommended games.<br>';
	}
	else {
		while ( $row = $result->fetch_assoc() ) {
			$out = $out.'The best recommended game for this user is ' . $row['title'] . '.<br>';
		}

	}
	if (empty($owner)) {
		$out = $out. 'No One Owns The Same Game As You.<br>';
	}
	else {
		while ( $row = $owner->fetch_assoc() ) {
			$out = $out.'Player ' . $row['First_Name'] . ' also owns '. $row['Game'] . 'and the GamerTag is '. $row['Tag']. '.<br>';
		}


	}
	echo "$out";
	exit();
}

?>
