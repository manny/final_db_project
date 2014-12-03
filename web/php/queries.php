
	<?php

	include 'DBConnect.php';

	$conn = openConnect();

	//print_r($_POST);

	if (isset($_POST['queries'])){
		$search=$_POST['queries'];
	}else{
		$search = array();
	}

	/*
	$search = $_POST['queries'];

	foreach($search as $s){
		echo "$s";
	};
	*/

	//	print_r($search);
	$out = array(array());
	$testForNow = array();
	if($search){
		foreach($search as $s){
			$tkn = explode(" : ", $s);
			if($tkn[0]=='web rating'){
				$dbQuery = 'SELECT * FROM TestGames WHERE web_rating='.$tkn[1];
				$result = $conn->query($dbQuery);
				while($row = $result->fetch_assoc()){
					//echo $row['title'];
					$out[]=array("title"=>$row['title'],"web_rating"=>$row['web_rating'],"user_rating"=>$row['user_rating'],"Developer"=>$row['Developer'],"Publisher"=>$row['Publisher'],"Genres"=>$row['Genres']);

				}
			}
			else if ($tkn[0]=='user rating') {
				$dbQuery = 'SELECT * FROM TestGames WHERE user_rating='.$tkn[1];
				$result = $conn->query($dbQuery);
				while($row = $result->fetch_assoc()){
					//echo $row['title'];
					$out[]=array("title"=>$row['title'],"web_rating"=>$row['web_rating'],"user_rating"=>$row['user_rating'],"Developer"=>$row['Developer'],"Publisher"=>$row['Publisher'],"Genres"=>$row['Genres']);
				}
			}
			else if ($tkn[0]=='title') {
				$dbQuery = 'SELECT * FROM TestGames WHERE title='.$tkn[1];
				$result = $conn->query($dbQuery);
				while($row = $result->fetch_assoc()){
					//echo $row['title'];
					$out[]=array("title"=>$row['title'],"web_rating"=>$row['web_rating'],"user_rating"=>$row['user_rating'],"Developer"=>$row['Developer'],"Publisher"=>$row['Publisher'],"Genres"=>$row['Genres']);
				}
			}
			else if ($tkn[0]=='developer') {
				$dbQuery = 'SELECT * FROM TestGames WHERE Developer='.$tkn[1];
				$result = $conn->query($dbQuery);
				while($row = $result->fetch_assoc()){
					//echo $row['title'];
						$out[]=array("title"=>$row['title'],"web_rating"=>$row['web_rating'],"user_rating"=>$row['user_rating'],"Developer"=>$row['Developer'],"Publisher"=>$row['Publisher'],"Genres"=>$row['Genres']);
				}
			}
			else if ($tkn[0]=='publisher') {
				$dbQuery = 'SELECT * FROM TestGames WHERE Publisher='.$tkn[1];
				$result = $conn->query($dbQuery);
				while($row = $result->fetch_assoc()){
					//echo $row['title'];
					$out[]=array("title"=>$row['title'],"web_rating"=>$row['web_rating'],"user_rating"=>$row['user_rating'],"Developer"=>$row['Developer'],"Publisher"=>$row['Publisher'],"Genres"=>$row['Genres']);
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
			<h1 class="remove-bottom"><a href="../index.php">Game Project!</a></h1>
			<h6>Finding some table shit!</h6>
			<br>
			<hr>
			<br>
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="myTable" width="100%">
				<thead>
					<tr>
						<th> Title </th>
						<th> Web Rating </th>
						<th> User Rating </th>
						<th> Developer </th>
						<th> Publisher </th>
						<th> Genres </th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
		<script>
		$(document).ready(function(){
			$('#myTable').DataTable();
		});
		<?php
		foreach($out as $games){
			echo "$('#myTable').DataTable().row.add([
			'".$games['title']."',
			'".$games['web_rating']."',
			'".$games['user_rating']."',
			'".$games['Developer']."',
			'".$games['Publisher']."',
			'".$games['Genres']."'
			]).draw();";
		}
		?>
		</script>
</body>
</head>
