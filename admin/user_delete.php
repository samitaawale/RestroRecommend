<?php
	include "config/functions.php";

	if(isset($_GET['id'])){

		escape($_GET['id']);
		$uid = $_GET['id'];
		$sql = "delete from users where id = '$uid' ";
		$login = query($sql);

		if($login){
			$_SESSION['user_action'] = " Users Deleted Successfully ! ! ! !";
		}

		else{
			$_SESSION['user_action'] = " Sorry, Problem Occured While Deleting User ";
		}

		header('location:users.php');
	}

	else{
		header('location:users.php');
	}