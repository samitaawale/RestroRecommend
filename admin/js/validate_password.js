// Function For Admin ChangePasswords Starts From Here . . . .

function validate_password() {
	
	var oldpass,newpass,confirmpass;

	oldpass = document.getElementById('oldpass').value;
	newpass = document.getElementById('newpass').value;
	confirmpass = document.getElementById('confirmpass').value;

	if(oldpass == "") {
		alert("Old Password is required ! ! !");
		getblank();
		return false;
	}
 
 	else if(newpass == "") {
		alert("New Password is required ! ! !");
		getblank();
		return false;
	}

 	else if(confirmpass == "") {
		alert("Confirm Password is required ! ! !");
		getblank();
		return false;
	}

	else if(confirmpass != newpass) {
		alert("Confirm and New Password do not match ! ! !");
		getblank();
		return false;
	}

	else if(strlen(oldpass)<5 || strlen(newpass)<5 || strlen(confirmpass)<5 ){
		alert("Password must be atleast 5 character ! ! !");
		getblank();
		return false;

	}

	else {
		return true;
		
	}
	function getblank(){

		document.getElementById("oldpass").value = "";
		document.getElementById("newpass").value = "";
		document.getElementById("confirmpass").value = "";
		document.getElementById("oldpass").focus();

	}
  
}

// Function for Add restaurants . .  Starts From Here . . ..  

function validate_restaurants(){

	var lon, lat, name, type, rest_details, img;

	lon =getElementById("Lon").value;
	lat =getElementById("Lat").value;
	name =getElementById("nam").value;
	type =getElementById("img").value;
	rest_details =getElementById("tp").value;
	img =getElementById("dtl").value;

	if(lon == ""){
		alert("Longitude is Empty ! ! !");
		getblank();

	}
	if(lat == ""){
		alert("Longitude is Empty ! ! !");
		getblank();

	}
	if(nam == ""){
		alert("Longitude is Empty ! ! !");
		getblank();

	}
	if(rest_details == ""){
		alert("Longitude is Empty ! ! !");
		getblank();

	}

	function getblank(){
		document.getElementById("Lon").value="";
		document.getElementById("Lat").value="";
		document.getElementById("nam").value="";
		document.getElementById("rest_details").value="";
		document.getElementById("dtl").value="";
		document.getElementById("Lon").focus();

	}

}