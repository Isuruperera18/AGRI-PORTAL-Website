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
    <title>Geolocation</title>
   
	
	<link rel="stylesheet" href="./map.css">
	<script type="text/javascript" src="./jquery.js"></script>	
	<script type="text/javascript" src="./map.js"></script>
	<script type="text/javascript" src="./post.js"></script>
	<script type="text/javascript" src="./jaximages.js"></script>
	
	
	
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvOqzptTESazp6b9FhxuqzChgqmGwMHPE&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <!-- jsFiddle will insert css and js -->
  </head>
  
  <?php include('../header.php') ?>
  
  <body>
	
	

    <div class="map_canvas">
	<form id="formtopost" name="reportsubmission" class="pure-form pure-form-aligned" method="post" action="store.php" enctype="multipart/form-data" >
    <fieldset>
	<?php include('errors.php'); ?>
        <div class="pure-control-group">
            <label for="aligned-name">එළවළු නම</label>
            <input name="vege_name" type="text" id="vn" placeholder="උදා : පතෝල" />
        </div>
		
        <div class="pure-control-group">
            <label for="aligned-name">බර (කිලෝග්‍රෑම්)</label>
            <input name="vege_weight" type="text" id="vw" placeholder="උදා : 1" />
        </div>
		
        <div class="pure-control-group">
            <label for="aligned-name">කිලෝග්‍රෑමයකට මිල රු</label>
            <input name="vege_ppk" type="text" id="vp" placeholder="උදා : 9" />
        </div>
		
		<div class="pure-control-group">
		<label for="aligned-name">වර්ගය</label>
		<select class="pure-control-group" name="protype" id="pt">
  <option value="vegetable">එළවළු</option>
  <option value="fruit">පලතුරු</option>
</select>
		
		
		</div>
		
		        <div class="pure-control-group">
            <label for="aligned-name">TEL</label>
            <input name="report_co" type="text" id="vtel" placeholder="උදා : 9" />
        </div>
		
		<div class="pure-control-group">
            <label for="aligned-name">පින්තූර උඩුගත කරන්න</label>
		<input onchange="preview_images();" type="file" id="files" name="files" multiple>
        </div>
		
					<div id="preview"></div>

		
        <div class="pure-controls">
            

			<button name="submit_report_btn" type="button" class="button-secondary pure-button" onclick="return post();" id="btn"  >වාර්තාව ඉදිරිපත් කරන්න</button>
			
        </div>

    </fieldset>
</form>
	
	
	
	
	<div id="map" ></div> 
	
	
	</div> 
	
	
	<button class="button-secondary pure-button" onclick="post();" id="btn2"  >Save this location</button>
	

  </body>
</html>