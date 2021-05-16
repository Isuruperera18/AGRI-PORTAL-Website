<!DOCTYPE html>
<html>
  <head>
    <title>Geolocation</title>
   
	
	<link rel="stylesheet" href="./map.css">
	<script type="text/javascript" src="./jquery.js"></script>	
	<script type="text/javascript" src="./map.js"></script>
	<script type="text/javascript" src="./post.js"></script>
	
	
	
    <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvOqzptTESazp6b9FhxuqzChgqmGwMHPE&callback=initMap&libraries=&v=weekly"
      defer
    ></script>
    <!-- jsFiddle will insert css and js -->
  </head>
  
  <?php include('../header.php') ?>
  
  <body>

    <div class="map_canvas">
	
	<div id="map" ></div> 
	
	
	</div> 
	
	
	<button class="button-secondary pure-button" onclick="post();" id="btn"  >Save this location</button>
  </body>
</html>