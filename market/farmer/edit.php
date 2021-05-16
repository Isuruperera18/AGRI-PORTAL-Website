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
    <title>Update</title>
   
	
	<link rel="stylesheet" href="./map.css">
	<script type="text/javascript" src="./jquery.js"></script>	
	<script type="text/javascript" src="./map2.js"></script>
	<script type="text/javascript" src="./post2.js"></script>
	<script type="text/javascript" src="./jaximages.js"></script>
	
	
	
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvOqzptTESazp6b9FhxuqzChgqmGwMHPE&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <!-- jsFiddle will insert css and js -->
  </head>
  
  <?php include('../header.php') ?>
    <?php include('../db.php') ?>
  <body>
	
	<?php

$id = $_GET['id'];

	$records = mysqli_query($db, "SELECT *
FROM reports where id = '$id' ");


while ($data = mysqli_fetch_array($records))
{
	  $vname = $data['name'];
    $vweight = $data['weight'];
    $vppk = $data['ppk'];
	$vimage = $data['bgimg']; 
	$type = $data['type'];
	$tel = $data['tel'];
	$id = $_GET['id'];
	
	
}
?>
	

    <div class="map_canvas">
	<form id="updateform" name="updateform" class="pure-form pure-form-aligned" method="post" action="update.php" enctype="multipart/form-data" >
    <fieldset>
	<?php include('errors.php'); ?>
	
	 <input type="hidden" id="idz" name="custId" value="<?php echo $id; ?>">
        <div class="pure-control-group">
            <label for="aligned-name">එළවළු නම</label>
            <input value="<?php echo $vname; ?>" name="vege_name" type="text" id="vn" placeholder="උදා : පතෝල" />
        </div>
		
        <div class="pure-control-group">
            <label for="aligned-name">බර (කිලෝග්‍රෑම්)</label>
            <input value="<?php echo $vweight; ?>" name="vege_weight" type="text" id="vw" placeholder="උදා : 1" />
        </div>
		
        <div class="pure-control-group">
            <label for="aligned-name">කිලෝග්‍රෑමයකට මිල රු</label>
            <input value="<?php echo $vppk; ?>" name="vege_ppk" type="text" id="vp" placeholder="උදා : 9" />
        </div>
		
				<div class="pure-control-group">
		<label for="aligned-name">වර්ගය</label>
		<select class="pure-control-group" name="protype" id="pt">
  <option value="<?php echo $type; ?>" >--</option>
  <option value="vegetable" >එළවළු</option>
  <option value="fruit">පලතුරු</option>
</select>
		
		
		</div>
		
				        <div class="pure-control-group">
            <label for="aligned-name">TEL</label>
            <input name="report_co" value="<?php echo $tel; ?>" type="text" id="vtel" placeholder="උදා : 9" />
        </div>
		
		<div class="pure-control-group">
            <label for="aligned-name">පින්තූර උඩුගත කරන්න</label>
		<input onchange="preview_images();" type="file" id="files" name="files" multiple>
        </div>
		
					<div id="preview"></div>

		
        <div class="pure-controls">
            

			<button name="submit_report_btn" type="button" class="button-secondary pure-button" onclick="return post();" id="btn"  >වාර්තාව යාවත්කාලීන  කරන්න</button>
			
        </div>

    </fieldset>
</form>
	
	

	
	<div id="map" ></div> 
	
	
	</div> 
	
	
	<button class="button-secondary pure-button" onclick="post();" id="btn2"  >Save this location</button>
	

  </body>
</html>