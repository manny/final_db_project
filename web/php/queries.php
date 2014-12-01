<?php

include 'DBConnect.php';

?>

<?php
if (isset($_POST['queries']))
	$search=$_POST[ 'queries' ];
else
	$search = array();
$output = array(array()); //holds all info about drinkers to output
$drinkerIDs = array(); //holds only drinkerIDs used to see if ID is already in list
if($search){
	foreach($search as $s){
		$tknize = explode(" : ",$s);
		if($tknize[0]=='title'){
			$conn = openConnect();
			$dbQuery = "SELECT * FROM TestGames";
			$result = dbQuery->query($dbQuery,);
			while($row=mysql_fetch_assoc($result)){
				if (!in_array($row['title'], $drinkerIDs)) {
					$drinkerIDs[]=$row['title'];
					$output[]=array("title"=>$row['title']);
				}
			}
		}
	} 

}
?>

<html>
   <head>
	  <link rel="stylesheet" type="text/css" href="../lib/datatables/media/css/jquery.dataTables.css" />
	  <link rel="stylesheet" type="text/css" href="../stylesheets/base.css" />
	  <link rel="stylesheet" type="text/css" href="../stylesheets/skeleton.css" />
	  <link rel="stylesheet" type="text/css" href="../stylesheets/layout.css" />
	  <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
	  <script type="text/javascript" src="../lib/datatables/media/js/jquery.dataTables.js"></script>
   </head>
   <body>
	  <div class="container" style="top:50px">
		 <h1 class="remove-bottom"><a href="../index.php">beerHarmony</a></h1>
		 <br>
		 <hr>
		 <br>
		 <table cellpadding="0" cellspacing="0" border="0" class="display" id="example" width="100%">
			<thead>
			   <tr>
				  <th> Name </th>
				  <th> Gender </th>
				  <th> Age </th>
				  <th> Country </th>
				  <th> Hotness </th>
			   </tr>   
			</thead>
			<tbody>
			</tbody>
		 </table>
	  </div>
<script>
<?php

foreach($output as $drinker){
	if (isset($drinker['drinkerID']))
		echo "$('#example').dataTable().fnAddData(['".$drinker['title'].."']);";
}

?>
