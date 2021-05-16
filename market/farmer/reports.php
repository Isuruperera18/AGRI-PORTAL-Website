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



<!DOCTYPE html>
<html>
  <head>
    <title>Reports</title>
   
	
	<link rel="stylesheet" href="./map.css">
	<script type="text/javascript" src="./jquery.js"></script>	
	<script type="text/javascript" src="./map.js"></script>
	<script type="text/javascript" src="./post.js"></script>
	<script type="text/javascript" src="./jaximages.js"></script>
	<link rel="stylesheet" href="./reports.css">
	
	

    <!-- jsFiddle will insert css and js -->
  </head>
  
  <?php include('../header.php') ?>
  <?php include('../db.php') ?>
  
  <body>
	
	<?php

$nic = $_SESSION['username'];
	$records = mysqli_query($db, "SELECT *
FROM reports where nic = '$nic' ");


while ($data = mysqli_fetch_array($records))
{
?>

<form id="eachrecord" name="records" class="pure-form pure-form-aligned" method="post" action="deleterecords.php" >



<div>
<label  class="lb1" > එළවළු නම :</label>
<?php echo $data['name']; ?>
</div>

<div>
<label  class="lb1" > බර :</label>
<?php echo $data['weight']; ?>
</div>

<div>
<label  class="lb1" > මිල :</label>
<?php echo $data['ppk']; ?>
</div>


<?php echo '
					
						<img src="data:image/png;base64,' . base64_encode($data['images']) . '"/>'; ?>






<button id="btns" name="delete_btn" value="<?php echo $data['id']; ?>" class="pure-button">Delete This</button>

<a id="btns2" class="pure-button" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>



</form>



<?php
}
?>
	

  </body>
</html>




