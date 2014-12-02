<html>
<body>
<?php

include 'DBConnect.php';

?>

<?php
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
        if($tkn[0]=='web_rating'){
            $dbQuery = 'SELECT * FROM TestGames WHERE web_rating='.$tkn[1];
            echo "<p> dawg </p>";
            $result = $conn->query($dbQuery);
            echo "<p> dawg </p>";
            while($row = $result->fetch_assoc()){
                echo "yo";
            }
        }
    } 
}
?>


</body>
</html>
