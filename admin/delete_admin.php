<?php
	include "config/functions.php";

	if(isset($_GET['id'])){

		escape($_GET['id']);
		$uid = $_GET['id'];
		$sql = "delete from admin where id = '$uid' ";
		$login = query($sql);

		if($login){
			$_SESSION['admin_action'] = " Admin Deleted Successfully ! ! !";
		}

		else{
			$_SESSION['admin_action'] = " Sorry, problem occured while deleting Admin ";
		}

		header('location:admin_list.php');
	}

	else{
		header('location:admin_list.php');
	}