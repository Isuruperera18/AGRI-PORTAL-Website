<?php include "connect.php"; ?>
<?php 
	session_start(); 

	if (!isset($_SESSION['username']) && $_SESSION['accesslevel'] !='keels') {
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
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link rel="stylesheet" href="./map.css">
		<link rel="stylesheet" href="./sidelist.css">
    <script src='./jquery.js'></script>       

    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    
    <script>
        
    var marker;
      function initialize() {
        var infoWindow = new google.maps.InfoWindow;
        
        var mapOptions = {
          mapTypeId: google.maps.MapTypeId.ROADMAP
        } 
 
        var map = new google.maps.Map(document.getElementById('map'), mapOptions);
        var bounds = new google.maps.LatLngBounds();

        // Retrieve data from database
        <?php
            $query = mysqli_query($con,"select * from reports");
            while ($data = mysqli_fetch_array($query))
            {
                $nama = $data['name'];
                $lat = $data['lat'];
                $lon = $data['lng'];
				$vw = $data['weight'];
				$img = $data['images'];

                
                echo ("addMarker($lat, $lon, '<b>$nama</b>, <b>$vw</b> ');\n");                        
            }
          ?>
          
        // Proses of making marker 
        function addMarker(lat, lng, info) {
            var lokasi = new google.maps.LatLng(lat, lng);
            bounds.extend(lokasi);
            var marker = new google.maps.Marker({
                map: map,
                position: lokasi
            });       
            map.fitBounds(bounds);
            bindInfoWindow(marker, map, infoWindow, info);
         }
        
        // Displays information on markers that are clicked
        function bindInfoWindow(marker, map, infoWindow, html) {
          google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
          });
        }
 
        }
      google.maps.event.addDomListener(window, 'load', initialize);
    
    </script>
    
</head>
<header>
<?php include('../../header.php') ?>
</header>
<body onload="initialize()">
<div class="sidelist_wrapper">
<?php include('./sidelist.php') ?>
</div>
    <div class="map_canvas">

 <div  id="map"></div>
</div>
 
</body>
</html>