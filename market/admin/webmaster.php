<?php 
	session_start(); 

	if (!isset($_SESSION['username']) && $_SESSION['accesslevel'] !='admin') {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../index.php");
	}

?>
<?php include('../header.php') ?>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="../../css/pure.css">
				<link rel="stylesheet" href="./panelstyles.css">
				</head>

				<body>

<div class="links_wrapper">

<div class="links_bucket">



<a class="pure-button pure-button-primary" href="webmaster/register.php">Register Staff</a>




</div>
</div>








				</body>
			</html>