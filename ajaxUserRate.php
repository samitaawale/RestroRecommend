<?php 

	include'connection/conn.php';
	$conn = connection();


	if(isset($_POST['rate']) && !empty($_POST['rate'])){

		$rate = mysqli_escape_string($conn, $_POST['rate']);
		$res_id = mysqli_escape_string($conn, $_POST['res_id']);
		$user_id = mysqli_escape_string($conn, $_POST['user_id']);

		if($conn){

			$sql = "SELECT * FROM restaurant_rating WHERE user_id = $user_id AND rest_id = $res_id";
			$result = mysqli_query($conn, $sql);
			$count = mysqli_num_rows($result);

			if($count == 0){

				$date = date('Y-m-d H:i:s');
				$sql = "INSERT INTO `restaurant_rating` (`user_id`, `rest_id`, `rating`, `created_at`) VALUES ('{$user_id}', '{$res_id}', '{$rate}', '{$date}');";
				$result = mysqli_query($conn, $sql);

				if($result){
					echo json_encode([
						"success" => true,
			  			"message" => "Thank You For Your Rating ! ! !"
					]);
				}else{
					echo json_encode([
						"success" => false,
			  			"message" => "Error Occur While Rating Restaurant ! ! !"
					]);
				}

			}else{

				$data = mysqli_fetch_assoc($result);
				$id   = $data['id'];
				$date = date('Y-m-d H:i:s');

				$sql = "UPDATE restaurant_rating SET `rating`= '{$rate}', `Updated_at`='{$date}' WHERE `id` = '{$id}';";
				$result = mysqli_query($conn, $sql);

				if($result){
					echo json_encode([
						"success" => true,
			  			"message" => "Your Rating Has Been Updated ! ! !"
					]);
				}else{
					echo json_encode([
						"success" => false,
			  			"message" => "Error Occur While Rating Restaurant ! ! !"
					]);
				}

			}


		}else{

			echo json_encode([
				"success" => false,
	  			"message" => "Database Connection Error ! ! !"
			]);

		}

	}


?>