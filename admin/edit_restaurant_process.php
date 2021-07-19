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
		
		$sql = "UPDATE restaurant_details SET NAME='$name', details='$desc', Lat='$lat', Lon='$lon', R_ID='$r_id', TYPE='$type' WHERE ID=$id";
		
		if(query($sql)){

			$_SESSION['res_error'] = "Successfully Updated The Restaurant ! ! !";
			header("location:restaurant.php");

		}else{

			$_SESSION['res_error'] = "SQL Query Error ! ! !";
			header("location:edit_restaurant.php?id=".$id);

		}

	}else{

		$_SESSION['res_error'] = "Invalid Request ! ! !";
		header("location:edit_restaurant.php?id=".$_POST['id']);

	}


?>