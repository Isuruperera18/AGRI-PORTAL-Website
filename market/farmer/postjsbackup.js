function post() {
	var x = document.forms["reportsubmission"]["vege_name"].value;
	if(x == "") {
		alert("කරුණාකර එළවළු නාමය ඇතුළත් කරන්න");
		return false;
	}
	var y = document.forms["reportsubmission"]["vege_weight"].value;
	if(y == "") {
		alert("කරුණාකර එළවළු බර ඇතුල් කරන්න");
		return false;
	}
	var z = document.forms["reportsubmission"]["vege_ppk"].value;
	if(z == "") {
		alert("කරුණාකර කිලෝග්‍රෑමයක මිල ඇතුළත් කරන්න");
		return false;
	}
	if(navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			


			
			
			$.ajax({
				url: 'store.php',
				data: {
					'lat': position.coords.latitude,
					'lng': position.coords.longitude,
					'vege_name': $('input[name=vege_name]').val(),
					'vege_weight': $('input[name=vege_weight]').val(),
					'vege_ppk': $('input[name=vege_ppk]').val(),
					'images': $('input[name=files]').val()
				},
				type: 'POST',
				

				success: function(result) {
					// If your backend page sends something back
					location.href = "farmer.php"
				}
			});
			// Use the 2 lines below to center your map on user location (you need a map instance at this point)
			userLoc = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
			map.panTo(userLoc);
		});
	}
}