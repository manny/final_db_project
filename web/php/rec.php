
<?php

include 'DBConnect.php';

$conn = openConnect();

$num = $_POST['indexNum'];
$tag = $_POST['gamerTag'];

if ($num == 3) {
  //$query = 'Select distinct title from TestGames g,Players,Owns where Players.GivenName='.$tag.' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title and g.web_rating+g.user_rating=(Select max(web_rating+user_rating) from TestGames g,Players,Owns where Players.GivenName='Samuel' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title)';
  $query = 'select distinct title from TestGames g,Players,Owns,Tags where Players.GivenName=Tags.GivenName and Players.Surname=Tags.Surname and Tags.Tag='."'$tag'". ' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title and g.web_rating+g.user_rating=(Select max(web_rating+user_rating) from TestGames g,Players,Owns,Tags where Players.GivenName=Tags.GivenName and Players.Surname=Tags.Surname and Tags.Tag='."'$tag'". ' and Owns.First_Name=Players.GivenName and g.Genres Like Concat("%",Players.Preferred_Genre,"%") and Owns.Game<>g.title)';
  $result = $conn->query($query);
  if (empty($result)) {
    echo "0";
    exit();
  }
  while ( $row = $result->fetch_assoc() ) {
    $out = $row['title'];
  }
  echo "$out";
  exit();
}

?>
