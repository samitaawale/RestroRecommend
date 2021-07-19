<?php 
session_start();
include "connection/conn.php";
$conn = connection();
	
	if(isset($_POST['btn']) && ($_POST['btn']) == "Sign Up"){

		mysqli_escape_string($conn,$_POST['username']);
		mysqli_escape_string($conn,$_POST['password']);
		mysqli_escape_string($conn,$_POST['con_password']);

		$uname = $_POST['username'];
		$pass = $_POST['password'];
		$confirm_pass = $_POST['con_password'];

		if(!empty($uname) && !empty($pass) && !empty($confirm_pass)){

			if($pass == $confirm_pass){
				$sql = "INSERT INTO users (username,password) VALUES ('$uname','$pass');";
				$login = mysqli_query($conn,$sql);
				
				if($login){
					$_SESSION['loginErr'] = "User Successfully Created ! ! ! !";
					header("location:log_in.php");
				}
				else{
					$_SESSION['signupErr'] = "Error occur while creating account";
					header("location:signup.php");
				}
			}

			else{
				$_SESSION['signupErr'] = "Password do not match !!";
				header("location:signup.php");
			}	

		}
		else{
			$_SESSION['signupErr'] = "Username or password is empty";
			header("location:signup.php");
		}	
	}
		
	else{
		header("location:signup.php");
	}


	
?>