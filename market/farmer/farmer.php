<!DOCTYPE html>
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

?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="../css/pure.css">
				<link rel="stylesheet" href="./farmer_styles.css">
				</head>
				<?php include('../header.php') ?>
				<body>

<div class="links_wrapper">

<div class="links_bucket">

<a class="pure-button pure-button-primary" href="./report.php">වාර්තාවක් ඉදිරිපත් කරන්න</a>

<a class="pure-button pure-button-primary" href="./reports.php">සියලුම වාර්තා</a>




</div>
</div>








				</body>
			</html>