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
			

    var vn = $("#vn").val();
    var vw = $("#vw").val();
	var vp = $("#vp").val();
    var pic = $("#files").prop('files')[0];
	var vt = $("#pt :selected").val(); 
	var vnum = $("#vtel").val();

    var data = new FormData();
	data.append('lat', position.coords.latitude);
	data.append('lng', position.coords.longitude);
    data.append('vege_name', vn);
    data.append('vege_weight', vw);
	data.append('vege_ppk', vp);
    data.append('images', pic);
	data.append('types', vt);
	data.append('vege_tel', vnum);
			
			
			$.ajax({
				url: 'store.php',
				data: data,
    processData: false,
    contentType: false,
	cache: false,
	
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