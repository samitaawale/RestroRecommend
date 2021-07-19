<?php include "config/functions.php";?>
<?php

	if(isset($_POST['btn']) && ($_POST['btn']) == "Change Password"){

		escape($_POST['oldpass']);
		escape($_POST['newpass']);
		escape($_POST['confirmpass']);
		
		$oldpass = $_POST['oldpass'];
		$newpass = $_POST['newpass'];
		$confirmpass = $_POST['confirmpass'];
		$admin_name = $_SESSION['admin_name'];

		$sql="SELECT * FROM admin WHERE username = '$admin_name' ";
		$login = query($sql);
		$data = mysqli_fetch_assoc($login);
		
		if($data['newpass'] == $oldpass){
			$_SESSION['changepassErr'] = "Old Password is not allowed ! ! !";
			header("location:changePass.php");
		}

		else{
			$sql = "UPDATE admin SET password = '$newpass' WHERE username = '$admin_name' ";
			// echo $_SESSION['admin_name'];
			// exit();
			$login = query($sql);

			if(!$login){
				var_dump($login);
				exit();
				$_SESSION['changepassErr'] = "Err in SQL Query ! ! !";
				header("location:changePass.php");
			}
			else{
				$_SESSION['admin_name'] = $newpass;
				header('location:index.php');
			}
		}
		
	}
	else{
		header('loction:changePass.php');
	}



?>