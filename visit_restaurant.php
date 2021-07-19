<?php 

	include 'includes/header.php';
	include 'connection/conn.php';

	$conn = connection();

 	if(!isset($_GET['id'])){

 		header('location:userPage.php');

	}else{

		if($conn){

			mysqli_escape_string($conn, $_GET['id']);
 			$res_id = $_GET['id'];
			$sql = "SELECT * FROM restaurant_details WHERE ID = $res_id";
			$login = mysqli_query($conn,$sql);
			$count = mysqli_num_rows($login);

			if($count == 1){

				$data = mysqli_fetch_assoc($login);
				$lat = $data['Lat'];
				$lon = $data['Lon'];
				$rest_name = $data['NAME'];
				$rate = $data['user_rate'];
				$desc = $data['details'];
?>
				<h2 class="container">Details About '<?= $rest_name; ?>'</h2><br>

				<?php
					$sql = "SELECT AVG(rating) as arate FROM restaurant_rating WHERE rest_id = $res_id";
					$avg_rating = mysqli_query($conn, $sql);

				if(mysqli_num_rows($avg_rating)){
					$data = mysqli_fetch_assoc($avg_rating);
					$avg_rating = $data['arate'];
				?>
					<span><h3 style="margin-left: 110px;">
						Average Rating: <?= number_format((float)$avg_rating, 1, '.', ''); ?>/5</h3>
					</span><br>
						
				<?php }else{?>
					<span><h3 style="margin-left: 110px;">No Rating Yet</h3></span><br>
				<?php } ?>

				<?php
				if(isset($_SESSION['user_id'])){

					$user_id = $_SESSION['user_id'];
					$sql = "SELECT rating FROM restaurant_rating WHERE user_id=$user_id AND rest_id=$res_id";

					$avg_rating = mysqli_query($conn, $sql);
					if(mysqli_num_rows($avg_rating) == 1){
						$data = mysqli_fetch_assoc($avg_rating);
						$urate = $data['rating'];
					}else{
						$urate = "";
					}
					
				}else{
					$urate = "";
				}
				?>

				<div style="margin-left: 110px;">
				<h3>Give The Rating: </h3>
					<form id="userRating" method="POST" action="javascript:;">
						<input type="hidden" name="user_id" 
							value="<?= $_SESSION['user_id']; ?>">
						<input type="hidden" name="res_id" 
							value="<?= $_GET['id']; ?>">
						<select name="rate" id="userRatingSelect" 
							onchange="setUserRating(this.value)">
							<option value="">--SELECT--</option>
							<?php for($i = 1; $i <= 5; $i ++): ?>
								<option value="<?= $i; ?>" 
									<?= ($urate == $i)?'selected':''; ?> >
									<?= $i; ?>		
								</option>
							<?php endfor; ?>
						</select>
					</form>
				</div>
				<div class="container">
					<table class="table ">
						<thead>
							<tr>
								<th>Location Of&nbsp; <?= $rest_name;?> </th>
								<th>Description</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
						<iframe 
						width="500" height="400"  frameborder="" allowfullscreen
			    		src="http://maps.google.com/maps?q=<?= $lat;?>,<?= $lon;?>&z=15&output=embed">	
			    		
				    	</iframe>
				    		</td>
								<td><?="<h3>".substr($desc, 0, 500).".........</h3>";?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			
		    	<?php
			}

			else{

				header('location:userPage.php');
			}
	 			
		}
		else{

			echo "Erro occur while connecting database ! !";
			header('location:userPage.php');
		}

	}

  ?>

  <script type="text/javascript">

	  function setUserRating(rate){

	  	<?php 
	  		if(isset($_SESSION['loggedUser'])){
	  	?>

	  	if(rate != "" && rate > 0 && rate < 6){

			var data = $("form#userRating").serialize();

	  		$.ajax({

		        url: "ajaxUserRate.php",
		        type: "post",
		        dataType: "json",
		        data: data,

		        success: function(response){            
		        	if(response.success){
		        		alert(response.message);
		        		location.reload();
		        	}else{
		        		alert(response.message);
		        	}
		        },

		        error: function(){
		           alert("Error Occur ! ! !");
		        }

		    });
	  	}

	  	<?php
		 		
		 	}else{

		?>

			alert('First Login To Rate ! ! !');
			document.getElementById('userRatingSelect').value = "";

		<?php
		 	}
	  	?>

	  	

	  }

  </script>

  <?php include 'includes/footer.php'; ?>

