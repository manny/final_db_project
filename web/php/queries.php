<html>
<body>

<?php

include 'DBConnect.php';

$conn = openConnect();

if (isset($_POST['queries'])){
	$search=$_POST['queries'];
}else{
	$search = array();
}

if($search){
    foreach($search as $s){
        echo $s;
        $tkn = explode(" : ", $s);
        echo $tkn[0];
        if($tkn[0]=='web rating'){
            $dbQuery = 'SELECT * FROM TestGames WHERE web_rating='.$tkn[1];
            echo $dbQuery;
            $result = $conn->query($dbQuery);
            while($row = $result->fetch_assoc()){
                echo $row['title'];
            }
        }
        else if ($tkn[0]=='user rating') {
            $dbQuery = 'SELECT * FROM TestGames WHERE user_rating='.$tkn[1];
            echo $dbQuery;
            $result = $conn->query($dbQuery);
            while($row = $result->fetch_assoc()){
                echo $row['title'];
            }

        }
    }
}

?>


</body>
</html>
