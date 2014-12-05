
	<?php

	include 'DBConnect.php';

	$conn = openConnect();

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
	$out = array();
	if($search){
		foreach($search as $s){
			$tkn = explode(" : ", $s);
			if($tkn[0]=='web rating'){
				$dbQuery = 'SELECT * FROM TestGames WHERE web_rating='."'$tkn[1]'";
				$result = $conn->query($dbQuery);
				if (empty($result)) {
					echo '<script language="javascript">';
					echo 'alert("Error with finding in database")';
					echo '</script>';
					exit();
				}
				while($row = $result->fetch_assoc()){
					//echo $row['title'];
					$out[]=array("title"=>$row['title'],"web_rating"=>$row['web_rating'],"user_rating"=>$row['user_rating'],"Developer"=>$row['Developer'],"Publisher"=>$row['Publisher'],"Genres"=>$row['Genres']);

				}
			}
			else if ($tkn[0]=='user rating') {
				$dbQuery = 'SELECT * FROM TestGames WHERE user_rating='."'$tkn[1]'";
				$result = $conn->query($dbQuery);
				if (empty($result)) {
					echo '<script language="javascript">';
					echo 'alert("Error with finding in database")';
					echo '</script>';
					exit();
				}
				while($row = $result->fetch_assoc()){
					//echo $row['title'];
					$out[]=array("title"=>$row['title'],"web_rating"=>$row['web_rating'],"user_rating"=>$row['user_rating'],"Developer"=>$row['Developer'],"Publisher"=>$row['Publisher'],"Genres"=>$row['Genres']);
				}
			}
			else if ($tkn[0]=='title') {
				$dbQuery = 'SELECT * FROM TestGames WHERE title='."'$tkn[1]'";
				$result = $conn->query($dbQuery);
				if (empty($result)) {
					echo '<script language="javascript">';
					echo 'alert("Error with finding in database")';
					echo '</script>';
					exit();
				}
				while($row = $result->fetch_assoc()){
					//echo $row['title'];
					$out[]=array("title"=>$row['title'],"web_rating"=>$row['web_rating'],"user_rating"=>$row['user_rating'],"Developer"=>$row['Developer'],"Publisher"=>$row['Publisher'],"Genres"=>$row['Genres']);
				}
			}
			else if ($tkn[0]=='developer') {
				$dbQuery = 'SELECT * FROM TestGames WHERE Developer='."'$tkn[1]'";
				$result = $conn->query($dbQuery);
				if (empty($result)) {
					echo '<script language="javascript">';
					echo 'alert("Error with finding in database")';
					echo '</script>';
					exit();
				}
				while($row = $result->fetch_assoc()){
					//echo $row['title'];
						$out[]=array("title"=>$row['title'],"web_rating"=>$row['web_rating'],"user_rating"=>$row['user_rating'],"Developer"=>$row['Developer'],"Publisher"=>$row['Publisher'],"Genres"=>$row['Genres']);
				}
			}
			else if ($tkn[0]=='publisher') {
				$dbQuery = 'SELECT * FROM TestGames WHERE Publisher='."'$tkn[1]'";
				$result = $conn->query($dbQuery);
				if (empty($result)) {
					echo '<script language="javascript">';
					echo 'alert("Error with finding in database")';
					echo '</script>';
					exit();
				}
				while($row = $result->fetch_assoc()){
					//echo $row['title'];
					$out[]=array("title"=>$row['title'],"web_rating"=>$row['web_rating'],"user_rating"=>$row['user_rating'],"Developer"=>$row['Developer'],"Publisher"=>$row['Publisher'],"Genres"=>$row['Genres']);
				}
			}
			else if ($tkn[0]=='genres') {
				$dbQuery = 'SELECT * FROM TestGames WHERE Genres='."'$tkn[1]'";
				$result = $conn->query($dbQuery);
				if (empty($result)) {
					echo '<script language="javascript">';
					echo 'alert("Error with finding in database")';
					echo '</script>';
					exit();
				}
				while($row = $result->fetch_assoc()){
					//echo $row['title'];
					$out[]=array("title"=>$row['title'],"web_rating"=>$row['web_rating'],"user_rating"=>$row['user_rating'],"Developer"=>$row['Developer'],"Publisher"=>$row['Publisher'],"Genres"=>$row['Genres']);
				}
			}
			else if ($tkn[0]=='esrb') {
				$dbQuery = 'SELECT * FROM TestGames WHERE esrb='."'$tkn[1]'";
				$result = $conn->query($dbQuery);
				if (empty($result)) {
					echo '<script language="javascript">';
					echo 'alert("Error with finding in database")';
					echo '</script>';
					exit();
				}
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
		<link rel="stylesheet" type="text/css" href="../lib/avgrund/style/avgrund.css" />
		<script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="../lib/datatables/media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="../lib/avgrund/jquery.avgrund.min.js"></script>
	</head>
	<body>
		<div id="bg"/>
		<div class="container" style="top:50px">
			<h1 class="remove-bottom"><a href="../index.php">Game<span id="R">R</span> Playe<span id="R">R</span></a></h1>
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

		var table = $('#myTable').DataTable();
		var rowIndex = 0;
		$('#myTable tbody').on( 'mouseenter', 'tr', function () {
			rowIndex = table.row( this ).index();
		} );
		$('#myTable tbody').on( 'click', 'td', function () {
			//alert( table.cell( this ).data() );
			var idx = table.cell(this).index().column;
			var index = table.column(idx).index();
			var title = table.column(idx).header();
			var dataVal = table.column(idx).data()[rowIndex];
			$.post('/web/php/getCount.php', {
				indexNum: index,
				info: dataVal
			}, function(returnedData) {
				if (returnedData != 0) {
				$('#myTable tbody').avgrund({
					height: 100,
					holderClass: 'box',
					showClose: true,
					closeByDocument: true,
					enableStackAnimation: true,
					onBlurContainer: '.container',
					template: 'There is ' + returnedData + ' games with the same ' + $(title).html() + '.'
				}).click();
				}
				else {
					$('#myTable tbody').avgrund({
						height: 100,
						holderClass: 'box',
						showClose: true,
						closeByDocument: true,
						enableStackAnimation: true,
						onBlurContainer: '.container',
						template: 'There are ' + returnedData + ' games with the same ' + $(title).html() + '.'
					}).click();
				}
			})
		});

		<?php
		$fromArray = array('"', '\'', '&'. '(', ')', '|');
		$toArray = array('', '', '', '', '', '');
		foreach($out as $games){
			$title = str_replace($fromArray, $toArray, $games['title']);
			$web_rating = str_replace($fromArray, $toArray, $games['web_rating']);
			$user_rating = str_replace($fromArray, $toArray, $games['user_rating']);
			$dev = str_replace($fromArray, $toArray, $games['Developer']);
			$pub = str_replace($fromArray, $toArray, $games['Publisher']);
			$genre = str_replace($fromArray, $toArray, $games['Genres']);

			echo "$('#myTable').DataTable().row.add([
			'".$title."',
			'".$web_rating."',
			'".$user_rating."',
			'".$dev."',
			'".$pub."',
			'".$genre."'
			]).draw();";
		}
		?>
		</script>
</body>
</head>
