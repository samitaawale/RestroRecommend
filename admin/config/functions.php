<?php 

	session_start(); 

	$conn = connections();

	function connections(){

		$conn = mysqli_connect("localhost","root","","restreco");
		if($conn){
			return $conn;
		}else{
			return mysql_connect_error();
		}
	}

	function escape($query){
		global $conn;
		return mysqli_escape_string($conn,$query);
	}

	function total_rows($query){
		return mysqli_num_rows($query);

	}

	function fetch_data($query){
		return mysqli_fetch_assoc($query);

	}
	
	function query($query){
		global $conn;
		return mysqli_query($conn,$query);

	}






