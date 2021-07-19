<?php 
	session_start();
	include 'connection/conn.php';
	$conn = connection();
	
	if(isset($_POST['btn']) && ($_POST['btn'])=="LogIn"){

		mysqli_escape_string($conn,$_POST['username']);
		mysqli_escape_string($conn,$_POST['password']);

		$uname = $_POST['username'];
		$pass = $_POST['password'];

		if(empty($uname) || empty($pass)){
			$_SESSION['loginErr'] = " username or password empty !!!!!";
			header('location:log_in.php');
		}
		if($conn){

			$sql = " SELECT id, username, password FROM users WHERE username = '$uname' AND password = '$pass' ";
			$login = mysqli_query($conn, $sql);
			$count = mysqli_num_rows($login);

			if($count == 1){ 
				
				$data = mysqli_fetch_assoc($login);
				$dataName = $data['username'];
				$dataPass = $data['password'];

				if($uname == $dataName && $pass == $dataPass){
						$_SESSION['loggedUser'] = $uname;
						$_SESSION['user_id'] = $data['id'];
						header("location:userPage.php");
				}else{
					$_SESSION['loginErr'] = "username password do not match ! ! !";
					header('location:log_in.php');
				}
			}else{
				$_SESSION['loginErr'] = "Invalid username or password ! ! !";
				header('location:log_in.php');
			}	
		}else{
			echo "database connection fail ! ! !";
			header("location:log_in.php");
		}
	}else{
		header("location:log_in.php");
	}

 ?>