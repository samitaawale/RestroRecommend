<?php 

	$title = "Edit Restaurant"; 
	include 'includes/admin_header.php';

	if(!isset($_GET['id'])){

		$_SESSION['res_error'] = "Invalid Restaurant ID ! ! ! !";
		header('location:restaurant.php');
	}

	$id = escape($_GET['id']);
	$sql = "SELECT * FROM restaurant_details WHERE ID = $id";
	$result = query($sql);

	if(total_rows($result) == 0){
		$_SESSION['res_error'] = "Invalid Restaurant ID ! ! ! !";
		header('location:restaurant.php');
	}

	$data = fetch_data($result);

?>

<div class="container col-md-7" style="margin-left: 200px;">
	<div style="margin-left: 320px;"><h2>Edit Restaurant</h2></div>
	
		<form class="form-vertical jumbotron col-md-12" style ="margin-left: 60px;" 
			method="post" action="edit_restaurant_process.php">

		    <div class="form-group ">

			    <label for="nam">Name:</label>
			   	<input type="text" class="form-control" id="nam" value="<?= $data['NAME']; ?>" 
			   		placeholder="Restaurant Name" name="name"><br/> 
			   	<input type="hidden" name="id" value="<?= $data['ID']; ?>">

			    <label for="Lon">Longitude:</label>
				<input type="text" class="form-control" id="Lon" value="<?= $data['Lon']; ?>" 
					placeholder="Longitude" name="lon"><br/>

			    <label for="Lat">Latitude:</label>
				<input type="text" class="form-control" id="Lat" value="<?= $data['Lat']; ?>" 
					placeholder="Latitude" name="lat"><br/>

			    <label for="tp">Type:</label><br/>
		    	<select name="type" class="form-control" id="tp">
		    		<option value="" selected>--Select--</option>
		    		<?php 

		    		$type = array(
			    				"1" => array("name" => "Family"),
			    				"2" => array("name" => "Friends"),
			    				"3" => array("name" => "Couple")
		    				);

	    			foreach($type as $key => $value):
			    		if($data['R_ID'] == $key): ?>
			    			<option value="<?= $key; ?>" selected><?= $value['name']; ?></option>
			    		<?php else: ?>
			    			<option value="<?= $key; ?>"><?= $value['name']; ?></option>
		    		<?php 
			    		endif; 
		    		endforeach;
		    		?>
		    	</select><br/>

			    <label for="dtl">Details:</label><br/>
			    <textarea name="desc" cols="80" rows="10" id="dtl" placeholder="Description"><?= $data['details']; ?></textarea><br/>

			    <input type="submit" name="btn" class="btn btn-default btn-success" value="Update"/>

		    </div>
	  	</form>      
	</div>
</div>


