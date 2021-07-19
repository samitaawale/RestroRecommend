var xmlhttp;
window.onload=function() {
	if (window.screen.availWidth<=736) {
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(successMobileLoc);
		}
	}
}

function successMobileLoc(position) {
	if (window.XMLHttpRequest) {
		xmlhttp=new XMLHttpRequest();
		var url = "http://foodio54.com/getLocFromLatLon.php?lat="+position.coords.latitude+"&lon="+position.coords.longitude;
		xmlhttp.open('GET',url,true);
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById('loc').value=xmlhttp.responseText;
			}
		}

		xmlhttp.send();
	}
}