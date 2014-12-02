<html>
<body>

<?php

include 'DBConnect.php';

$conn = openConnect();

print_r($_POST);

if (isset($_POST['queries'])){
    echo "[]";
	$search=array($_POST['queries']);
}else{
    echo "not set";
	$search = array();
}
echo "</br>";
if($search){
    foreach($search as $s){
        $tkn = explode(" : ", $s);
        echo $tkn[0];
        echo "</br>";
        if($tkn[0]=='web rating'){
            $dbQuery = 'SELECT * FROM TestGames WHERE web_rating='.$tkn[1];
            $result = $conn->query($dbQuery);
            while($row = $result->fetch_assoc()){
                echo $row['title'];
                echo "</br>";
            }
        }
        else if ($tkn[0]=='user rating') {
            $dbQuery = 'SELECT * FROM TestGames WHERE user_rating='.$tkn[1];
            $result = $conn->query($dbQuery);
            while($row = $result->fetch_assoc()){
                echo $row['title'];
                echo "</br>";
            }

        }
    }
}

?>


</body>
</html>
