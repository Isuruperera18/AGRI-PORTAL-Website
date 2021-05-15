<!DOCTYPE html>
<?php
session_start();

if (isset($_GET['logout']))
{
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
}

?>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/pure.css">
	<link rel="stylesheet" href="./css/public_styles.css">
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/Chart.min.js"></script>
	<script type="text/javascript" src="./navipopups.js"></script>
</head>
<?php include('header.php') ?>

	<body>
		<div class="home_wrapper">
		
		<div id="chart-container">
        <canvas id="graphCanvas"></canvas>
    </div>
		
		
		
		</div>
	</body>

</html>