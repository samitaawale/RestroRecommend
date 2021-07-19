<?php 

	include 'config/functions.php';

	if(isset($_POST['btn'])){

		$id = escape($_POST['id']);
		$name = escape($_POST['name']);
		$lat  = escape($_POST['lat']);
		$lon  = escape($_POST['lon']);
		$r_id = escape($_POST['type']);
		$desc = escape($_POST['desc']);

		if($r_id == 1){
			$type = "Family";
		}elseif($r_id == 2){
			$type = "Friends";
		}else{
			$type = "Couple";
		}
		
		$sql = "INSERT INTO restaurant_details (NAME, details, Lat, Lon, R_ID, TYPE) VALUES ('$name', '$desc', '$lat', '$lon', '$r_id', '$type') ";

		if(query($sql)){

			$_SESSION['res_error'] = "Successfully Add The Restaurant ! ! !";
			header("location:restaurant.php");

		}else{

			$_SESSION['res_error'] = "SQL Query Error ! ! !";
			header("location:restaurant.php");

		}

	}else{

		$_SESSION['res_error'] = "Invalid Request ! ! !";
		header("location:restaurant.php");

	}

 ?>