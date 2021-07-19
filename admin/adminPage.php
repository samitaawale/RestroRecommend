<?php 

	$title="Admin Dashboard	"; 
	include"includes/admin_header.php";

	$sql[] = "SELECT COUNT(*) as total FROM users";
	$sql[] = "SELECT COUNT(*) as total FROM admin";
	$sql[] = "SELECT COUNT(*) as total FROM restaurant_details";

	for($i = 0; $i < count($sql); $i++):
		if($result = query($sql[$i])):
			$count = fetch_data($result);
			$data[] = $count['total'];
		endif;
	endfor;

?>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
		integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" 
		crossorigin="anonymous">

<link rel="stylesheet" href="./assets/css/cart.css">
  
	<div class="col-lg-12 p-4 y-auto">
  		<div class="row justify-content-between">

			<!-- Total Users  -->
			<div class="col-lg-3 col-md-3 col-sm-3 ">
				<div class="card card-stats">
					<div class="card-header card-header-warning card-header-icon">
						<div class="card-icon"><i class="fas fa-user"></i></div>
						<p class="card-category">Total User</p>
						<h3 class="card-title"><?= $data[0]; ?></h3>
						<a href="users.php"><i class="fas fa-arrow-right"></i></a>
					</div>
				</div>
			</div>

			<!-- Total Users  -->
			<div class="col-lg-3 col-md-3 col-sm-3 ">
				<div class="card card-stats">
					<div class="card-header card-header-warning card-header-icon">
						<div class="card-icon"><i class="fas fa-user"></i></div>
						<p class="card-category">Total Admin</p>
						<h3 class="card-title"><?= $data[1]; ?></h3>
						<a href="admin_list.php"><i class="fas fa-arrow-right"></i></a>
					</div>
				</div>
			</div>

			<!-- Total Users  -->
			<div class="col-lg-3 col-md-3 col-sm-3 ">
				<div class="card card-stats">
					<div class="card-header card-header-warning card-header-icon">
						<div class="card-icon"><i class="fas fa-chart-bar"></i></div>
						<p class="card-category">Total Restaurant</p>
						<h3 class="card-title"><?= $data[2]; ?></h3>
						<a href="restaurant.php"><i class="fas fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
				
		</div>

	</div>

</body>

</html>