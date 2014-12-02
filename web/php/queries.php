<html>
<body>
<?php

include 'DBConnect.php';

$conn = openConnect();

if (isset($_POST['queries'])){
    echo "post";
	$search=$_POST['queries'];
}else{
    echo "not";
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
            echo "<p> dawg </p>";
            $result = $conn->query($dbQuery);
            echo "<p> dawg </p>";
            while($row = $result->fetch_assoc()){
                echo $row['title'];
            }
        }
    } 
}
?>


</body>
</html>
