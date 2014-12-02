<html>
<body>

<?php

include 'DBConnect.php';
include 'HTML.php';
$conn = openConnect();


if (isset($_POST['queries'])){
	$search=$_POST['queries'];
}else{
	$search = array();
}
function printTable($result) {
	heading();
	while($row = $result->fetch_assoc()){
		toHTML($row);
	}
	endTable();

}

if($search){
	foreach($search as $s){
		$tkn = explode(" : ", $s);
		if($tkn[0]=='web rating'){
			$dbQuery = 'SELECT * FROM TestGames WHERE web_rating='.$tkn[1];
			$result = $conn->query($dbQuery);
			printTable($result);
		}
		else if ($tkn[0]=='user rating') {
			$dbQuery = 'SELECT * FROM TestGames WHERE user_rating='.$tkn[1];
			$result = $conn->query($dbQuery);
			printTable($result);
		}
		else if ($tkn[0]=='title') {
			$dbQuery = 'SELECT * FROM TestGames WHERE title='.$tkn[1];
			$result = $conn->query($dbQuery);
			printTable($result);
		}
		else if ($tkn[0]=='eveloper') {
			$dbQuery = 'SELECT * FROM TestGames WHERE developer='.$tkn[1];
			$result = $conn->query($dbQuery);
			printTable($result);
		}
		else if ($tkn[0]=='genre') {
			$dbQuery = 'SELECT * FROM TestGames WHERE genre='.$tkn[1];
			$result = $conn->query($dbQuery);
			printTable($result);
		}
		else if ($tkn[0]=='players') {
			$dbQuery = 'SELECT * FROM TestPlayers WHERE Givenname='.$tkn[1];
			$result = $conn->query($dbQuery);
			printTable($result);
		}
	}
}

?>


</body>
</html>
