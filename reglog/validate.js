function post() {
	
	var x = document.forms["signupform1"]["username"].value;
	if(x == "") {
		alert("කරුණාකර ඔබගේ ජාතික හැඳුනුම්පත් අංකය ඇතුළත් කරන්න");
		return false;
	}
	
		if(isNaN(x) ) {
		alert("කරුණාකර වලංගු ජාතික හැඳුනුම්පත් අංකයක් ඇතුළත් කරන්න");
		return false;
	}
	
	
}