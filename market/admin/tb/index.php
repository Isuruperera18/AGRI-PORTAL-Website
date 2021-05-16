<!DOCTYPE html>
<?php
session_start();


	if (!isset($_SESSION['username']) && $_SESSION['accesslevel'] !='doa') {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../index.php');
	}



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
	<link rel="stylesheet" href="../.././css/pure.css">

	<link rel="stylesheet" href="../../css/grids-core.css">
	<link rel="stylesheet" href="./tb.css">
	<script type="text/javascript" src="../../js/jquery.js"></script>
	<script type="text/javascript" src="./innerload.js"></script>

	
</head>


<?php include('../../header.php') ?>


<body>

<div class="tables_wrapper">

<div class="btn_wrapper">


<button class="button-secondary pure-button"  id="btn"  >All records</button>

<button class="button-secondary pure-button"  id="btn3"  >Filter Vegetables</button>
<button class="button-secondary pure-button"  id="btn2"  >Filter Fruits</button>
</div>

<div class="table_wrapper">
<div name="ajaxloader" id="div1"></div>
</div>

</div>
</body>
<?php include('./footer.php') ?>
</html>