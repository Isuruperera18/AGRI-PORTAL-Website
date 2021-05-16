<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	session_start(); 

	if (!isset($_SESSION['username']) && $_SESSION['accesslevel'] !='farmer') {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../index.php");
	}
	





/* including db file */
include "../db.php";
 
// Check connection
if($db === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 

 
// Escaping user inputs for security

$vegename = isset($_POST['vege_name']) ? $_POST['vege_name']: '';
$vegeweight = isset($_POST['vege_weight']) ? $_POST['vege_weight']: '';
$vegeppk = isset($_POST['vege_ppk']) ? $_POST['vege_ppk']: '';
$lats = isset($_POST['lat']) ? $_POST['lat']: '';
$lngs = isset($_POST['lng']) ? $_POST['lng']: '';
$image = addslashes(file_get_contents($_FILES['images']['tmp_name']));
$nic = $_SESSION['username'];
$type = isset($_POST['types']) ? $_POST['types']: '';
$id = isset($_POST['id']) ? $_POST['id']: '';
$vtel = isset($_POST['vege_tel']) ? $_POST['vege_tel']: '';







 
// inserting query execution


$sql = "UPDATE reports SET name = '$vegename', weight = '$vegeweight', ppk = '$vegeppk', lat = '$lats', lng = '$lngs', images = '$image', type = '$type' , tel='$vtel' WHERE id ='$id'";

if(mysqli_query($db, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
 


// Closing the connection
mysqli_close($db);


?>
