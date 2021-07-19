<?php 
	
	function connection(){

		$connect = mysqli_connect("localhost","root","","restreco");
		if($connect){
			return $connect;
		}else{
			return mysql_connect_error();
		}
	}


	