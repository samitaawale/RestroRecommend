<?php 

	$title="View Restaurant";
	include "includes/admin_header.php";

	$sql = "SELECT * FROM restaurant_details ORDER BY NAME ";
	$login = query($sql);
	$count = total_rows($login);	

 ?>

  	<CENTER class="container"><h2 style="color:#00134d;">List Of The Restaurants</h2></CENTER>

  		<?php if(isset($_SESSION['res_error'])): ?>
  			<div class="container text-center h3"><?= $_SESSION['res_error']; unset($_SESSION['res_error'])?></div>
  		<?php endif; ?>

		<div class="col-md-10 jumbotron" style="margin-left: 110px;">
			<a href="add_restaurant.php">Add Restaurant</a>
			<table class="table table-striped table-responsive table-bordered ">
		    <thead>
		      <tr>
		        <th>#</th>
		        <th>Name</th>
		        <th>Latitude</th>
		        <th>Longitude</th>
		        <th>Type</th>
		        <th>Action</th>
		      </tr>
		    </thead>  		
	    <tbody>
	    <?php 
				$sn = 1;
				if($count >= 1){
					while($data = fetch_data($login)) { ?>
				   <tr>
			      		<td> <?= $sn++; ?> </td>
	    		        <td> <?= $data['NAME'];?> </td>
					    <td> <?= $data['Lat'];?> </td>
					    <td> <?= $data['Lon'];?> </td>
					    <td> <?= $data['TYPE'];?> </td>
		        		<th>
		        			<div class="btn btn-success">
		        				<a href="edit_restaurant.php?id=<?= $data['ID']; ?>">Edit </a>
		        				|
		        				<a href="delete_restaurant.php?id=<?= $data['ID']; ?>"
		        					onclick="return confirm('Are You Sure Want To Delete ?')"> Delete</a>
		        			</div>
		        		</th>
		   	       </tr> 
		   	    <?php } ?>
		</tbody>
	</table>
		</div>
	<?php
		}
		else{

			echo"<h2>No members Available ! !</h2>";
		}


 	?>

  
  	</body>
  	
  </html>