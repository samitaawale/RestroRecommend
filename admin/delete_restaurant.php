<?php 

	include 'config/functions.php';

	if(isset($_GET['id'])){

		$id = escape($_GET['id']);
		$sql = "DELETE FROM restaurant_details WHERE ID=$id";
		
		if(query($sql)){

			$_SESSION['res_error'] = "Successfully Deleted The Restaurant ! ! !";
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