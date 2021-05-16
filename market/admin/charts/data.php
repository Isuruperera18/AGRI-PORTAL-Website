<?php
header('Content-Type: application/json');

$conn = mysqli_connect("127.0.0.1","root","localserver2020","vmarket");



/*$sqlQuery = "SELECT id,name,ppk,type FROM reports ORDER BY id";*/



$sqlQuery = "SELECT name, AVG(ppk) as ppk FROM reports GROUP BY name";




$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>