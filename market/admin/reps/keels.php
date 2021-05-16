<?php 
	session_start(); 

	if (isset($_SESSION['username']) && $_SESSION['accesslevel'] !='keels') {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../index.php');
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: ../index.php");
	}

?>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../css/pure.css">
	<link rel="stylesheet" href="../css/home_styles.css">
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/navipopups.js"></script>
</head>
<?php include('../header.php') ?>

	<body>
		<div class="home_wrapper"></div>
	</body>

</html>