<?php 

include 'config/functions.php';
// $conn = connection();
	
	if(isset($_POST['btn']) && ($_POST['btn'])=="LogIn"){

		escape($_POST['username']);
		escape($_POST['password']);
		// $uname = '';
		// $pass = '';
		$uname = $_POST['username'];
		// $dataName = '';
		// $dataPass = '';
		$pass = $_POST['password'];

		if(empty($uname) || empty($pass)){
			

			$_SESSION['adminloginErr'] = " username or password is empty !!!!!";
			header('location:index.php');

		}

		if($conn){

			$sql = " SELECT username, password FROM admin WHERE username = '$uname' AND password = '$pass' ";
			$login = query($sql);
			$count = total_rows($login);

			if($count == 1){ 
				
				$data = fetch_data($login);
				$dataName = $data['username'];
				$dataPass = $data['password'];

				if ($uname == $dataName && $pass == $dataPass) {

						$_SESSION['admin_name']=$uname;
						header("location:adminPage.php");
				}
				else{
					$_SESSION['adminloginErr'] = "username password do not match !";
					header('location:index.php');
				}
			}
			else{

				$_SESSION['adminloginErr'] = "Invalid username or password ! ! !";
				header('location:index.php');

			}
				
		}

		else{
			echo "database connection fail ! ! !";
			header("location:index.php");
		}
			 
		
	}
	else{
		header("location:index.php");
	}



 ?>





	// if(isset($_POST['btn']) && ($_POST['btn'])=="LogIn"){
		
	// 	escape($_POST['username']);
	// 	escape($_POST['password']);
	// 	$uname = $_POST['username'];
	// 	$pass = $_POST['password'];

	// 	if (empty($uname) || empty($pass)) {

	// 		$_SESSION['adminloginErr']="Username or Password is empty ! ! !";
	// 		header("location:index.php");
			
	// 	}
	// 	else{

	// 		$sql = "SELECT username, password FROM admin WHERE username = '$uname' AND password = '$pass' ";
	// 		$login = query($sql);
	// 		$count = total_rows($login);
			
	// 		if($count == 1){

	// 			$data = fetch_data($login);
	// 			$admin_name = $data['username'];
	// 			$admin_pass = $data['password'];
	// 			if($admin_name == $uname && $admin_pass == $pass){

	// 				echo "HELLO";
	// 				exit();

	// 				$_SESSION['admin_name'] = $uname;
	// 				header("location:adminPage.php");

	// 			}
	// 			else{

	// 				$_SESSION['loginErr']="Username or Password do not match ! ! !";
	// 				header("location:index.php");

	// 			}
				
	// 		}
			
	// 	}

	// }
	// else{

	// 	header("location:index.php");
	// }




 // ?>