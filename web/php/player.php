<?php

include 'DBConnect.php';

$conn = openConnect();

$dbQuery = 'SELECT * FROM FinalTags';
$result = $conn->query($dbQuery);
while($row = $result->fetch_assoc()){
	//echo $row['title'];
	$out[]=array("ID"=>$row['ID'],"GivenName"=>$row['GivenName'],"Gender"=>$row['Gender'],"Tag"=>$row['Tag']);

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
		<div id="bg">
		<div class="container" style="top:50px">
			<h1 class="remove-bottom"><a href="../index.php">Game<span id="R">R</span> Playe<span id="R">R</span></a></h1>
			<br>
			<hr>
			<br>
			<table cellpadding="0" cellspacing="0" border="0" class="display" id="playerTable" width="100%">
				<thead>
					<tr>
						<th> ID </th>
						<th> First Name </th>
						<th> Gender </th>
						<th> Tag </th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
<script>

var table = $('#playerTable').DataTable( {
	"pageLength": 5
});
var rowIndex = 0;
$('#playerTable tbody').on( 'mouseenter', 'tr', function () {
	rowIndex = table.row( this ).index();
} );
$('#playerTable tbody').on( 'click', 'td', function () {
	//alert( table.cell( this ).data() );
	var idx = table.cell(this).index().column;
	var index = table.column(idx).index();
	var title = table.column(idx).header();
	var dataVal = table.column(idx).data()[rowIndex];
	$.post('/web/php/rec.php', {
		indexNum: index,
		gamerTag: dataVal
	}, function(returnedData) {
		if (returnedData != 0) {
			$('#playerTable tbody').avgrund({
				height: 100,
				holderClass: 'box',
				showClose: true,
				closeByDocument: true,
				enableStackAnimation: true,
				onBlurContainer: '.container',
				template: returnedData
			}).click();
		}
		else {
			$('#playerTable tbody').avgrund({
				height: 100,
				holderClass: 'box',
				showClose: true,
				closeByDocument: true,
				enableStackAnimation: true,
				onBlurContainer: '.container',
				template: 'There is no information.'
			}).click();
		}
	})
});

<?php
foreach($out as $ID){
	echo "$('#playerTable').DataTable().row.add([
		'".$ID['ID']."',
		'".$ID['GivenName']."',
		'".$ID['Gender']."',
		'".$ID['Tag']."'
	]).draw();";
}
?>
</script>
</div>
</body>
</head>
</html>
