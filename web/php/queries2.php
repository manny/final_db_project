
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
		$fromArray = array('"', '\'', '&'. '(', ')', '|', ':');
		$toArray = array('', '', '', '', '', '', '');
		foreach($search as $s){
			//print_r($s);
			$x = str_replace($fromArray, $toArray, $s);
			$tkn = explode(" - ", $x);
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
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="/js/skel.min.js"></script>
		<script src="/js/init.js"></script>
        <script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="/css/style.css" />
			<link rel="stylesheet" href="/css/style-wide.css" />
			<link rel="stylesheet" href="/css/style-noscript.css" />
		</noscript>
		<link rel="stylesheet" type="text/css" href="/lib/datatables/media/css/jquery.dataTables.css" />
		<script type="text/javascript" src="/js/jquery-1.10.2.js"></script>
		<script type="text/javascript" src="/lib/datatables/media/js/jquery.dataTables.js"></script>
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<div id="overlay"></div>
			<div id="main">
				<!-- Header -->
					<header id="header">
            

		<div class="container" style="top:50px">
			<h1 class="remove-bottom"><a href="../index.php">Game<span id="R">R</span> Playe<span id="R">R</span></a></h1>
			<br>
			<hr>
			<br>
			<table cellpadding="0" cellspacing="0" border="0" class="cell-border" id="myTable" width="100%">
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
        </header>

    <!-- Footer -->
        <footer id="footer">
            <span class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.</span>
        </footer>
			</div>
		</div>
</body>
</head>
