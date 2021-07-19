<?php

	include 'includes/header.php';
	include'connection/conn.php';
	$conn = connection();

	if (isset($_GET['btn']) and ($_GET['btn']) == "search") {

		mysqli_escape_string($conn, $_GET['rest_type']);
		mysqli_escape_string($conn, $_GET['latitude']);
		mysqli_escape_string($conn, $_GET['longitude']);

		$rest_type = $_GET['rest_type'];
		$latitude = $_GET['latitude'];
		$longitude = $_GET['longitude'];

		$_SESSION['lati'] = $latitude;
		$_SESSION['long'] = $longitude;

		if($rest_type != "null"){	
			
			$sql = "SELECT Lat, Lon,NAME,TYPE FROM restaurant_details WHERE R_ID = '$rest_type'";
			$login = mysqli_query($conn,$sql);
			$count = mysqli_num_rows($login);
	
			if ($count > 0){
?>
				<div class="container col-md-8" style="margin-left: 200px;">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>SN</th>
								<th>NAME</th>
								<th>TYPE</th>
								<th>Distance</th>
							</tr>
						</thead>
							<?php
								$sn = 1;
							{
							
							$sql1 = "SELECT ID,NAME,Lat,Lon,TYPE,(6371*acos(cos(radians({$latitude}))*cos(radians(Lat))*cos( radians(Lon)-radians({$longitude}))+sin(radians($latitude))*sin(radians(Lat)))) AS distance FROM restaurant_details  where 1=1 ";

									if($rest_type > 0)
									$sql1.=" AND R_ID = '$rest_type'";
									$sql1.=" ORDER BY (6371*acos(cos(radians({$latitude}))*cos(radians(Lat))*cos( radians(Lon)-radians({$longitude}))+sin(radians($latitude))*sin(radians(Lat)))) asc LIMIT 0, 7";
									$result = mysqli_query($conn,$sql1); { ?>	
									<tbody>
									<?php
										$map_array=array();
										$k=0; 
										while ($data1 = (mysqli_fetch_assoc($result))){
                                        	$map_array[$k]['Lat'] = $data1['Lat'];
                                        	$map_array[$k]['Lon']=$data1['Lon'];
                                        	$map_array[$k]['NAME']=$data1['NAME'];
                                           	$k=$k+1; 
									?>
											<tr>
												<td><?= $sn?></td>
												<td><a href="visit_restaurant.php?id=<?= $data1['ID']; ?>">
														<?= $data1['NAME']?>
													</a>
												</td>
												<td><?= $data1['TYPE']?></td>
												<td><?= number_format(($data1['distance']),3)." Km"?></td>
											</tr>
											<?php $sn++; }
									?>
									</tbody>
						</table>
					</div>

				<?php include 'map.php';

						}
					}							
				}
			}else{

				echo "Data not found !!!!";
				header("location:index.php");

			}

		}else{

			header("location:index.php");

		}

	include('includes/footer.php'); 

?>

