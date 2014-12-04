
<?php

include 'DBConnect.php';

$conn = openConnect();

$num = $_POST['indexNum'];
$tag = $_POST['gamerTag'];


if ($num == 0) {
  $query = 'select Ethnicity,Players.GivenName,Players.Surname,City,State,Income,Marital_Status from Players,Tags where Tags.GivenName=Players.GivenName and Tags.Surname=Players.Surname and Tags.ID='."'$tag'";
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
  //$query = 'Select distinct title from TestGames g,Players,Owns where Players.GivenName='.$tag.' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title and g.web_rating+g.user_rating=(Select max(web_rating+user_rating) from TestGames g,Players,Owns where Players.GivenName='Samuel' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title)';
  $query = 'select distinct title from TestGames g,Players,Owns,Tags where Players.GivenName=Tags.GivenName and Players.Surname=Tags.Surname and Tags.Tag='."'$tag'". ' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title and g.web_rating+g.user_rating=(Select max(web_rating+user_rating) from TestGames g,Players,Owns,Tags where Players.GivenName=Tags.GivenName and Players.Surname=Tags.Surname and Tags.Tag='."'$tag'". ' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title)';
  $result = $conn->query($query);
  if (empty($result)) {
    echo 'There are no recommended games.';
    exit();
  }
  while ( $row = $result->fetch_assoc() ) {
    $out = 'The best recommended game for this user is ' . $row['title'] . '.';
  }
  echo "$out";
  exit();
}

?>
