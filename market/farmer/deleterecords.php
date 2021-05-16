<?php


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
	


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* including db file */
include "../db.php";

// Check connection
if ($db === false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if (isset($_POST['delete_btn']))
{

    // Escaping user inputs for security
    $ids = mysqli_real_escape_string($db, $_POST['delete_btn']);



    // inserting query execution
    $sql = "delete from reports where id='$ids'";

}








if (mysqli_query($db, $sql))
{
    echo "Records added successfully.";
	header("Location: reports.php");
}
else
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

// Closing the connection
mysqli_close($db);
?>
