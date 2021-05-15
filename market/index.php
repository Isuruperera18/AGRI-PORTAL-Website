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
	<link rel="stylesheet" href="./css/homep.css">
	<link rel="stylesheet" href="./css/grids-core.css">
	<script type="text/javascript" src="./js/jquery.js"></script>
	<script type="text/javascript" src="./js/Chart.min.js"></script>
	<script type="text/javascript" src="./navipopups.js"></script>
	
</head>


<?php include('./header.php') ?>


<body>


<div class="splash-container">
<div class="splash">
	<h1 class="splash-head">AGRI PORTAL</h1>
</div> 
<div class="getbtn" >
	<a href="/market/reglog/login.php" class="pure-button pure-button-primary">Post Your Harvest</a>
 </div>
</div>

<div class="products">

<div class="product1">

<div class="proimage">
<img src="./img/tomatoes.jpg" >
</div>
<div class="protext">
<p>Fresh Tomatoes</P>
</div>

</div>

<div class="product1">

<div class="proimage">
<img src="./img/brinjal.jpg">
</div>
<div class="protext">
<p>High Quality Brinjal</P>
</div>

</div>

<div class="product1">

<div class="proimage">
<img src="./img/bananas.jpg" alt="Italian Trulli">
</div>
<div class="protext">
<p>Big Bananas</P>
</div>

</div>








</div>

<div class="videowrapper">

<iframe src="https://www.youtube.com/embed/9fh1H8OMFsE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


</div>

</body>
<?php include('./footer.php') ?>
</html>