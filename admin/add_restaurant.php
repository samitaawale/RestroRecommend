<?php 

	$title = "Add Restaurant";
	include 'includes/admin_header.php'; 
?>

<div class="container col-md-7" style="margin-left: 200px;">
	<div style="margin-left: 320px;"><h2>Add Restaurant</h2></div>
	
		<form class="form-vertical jumbotron col-md-12" style ="margin-left: 60px;" 
			method="post" action="add_restaurant_process.php">

		    <div class="form-group ">

			    <label for="nam">Name:</label>
			   	<input type="text" class="form-control" id="nam" 
			   		placeholder="Restaurant Name" name="name"><br/> 
			   	<input type="hidden" name="id" value="<?= $data['ID']; ?>">

			    <label for="Lon">Longitude:</label>
				<input type="text" class="form-control" id="Lon" 
					placeholder="Longitude" name="lon"><br/>

			    <label for="Lat">Latitude:</label>
				<input type="text" class="form-control" id="Lat" 
					placeholder="Latitude" name="lat"><br/>

			    <label for="tp">Type:</label><br/>
		    	<select name="type" class="form-control" id="tp">
		    		<option value="">--Select--</option>
		    		<option value=1>Family</option>
		    		<option value=2>Friends</option>
		    		<option value=3>Couple</option>
		    	</select><br/>


			    <label for="dtl">Details:</label><br/>
			    <textarea name="desc" cols="80" rows="10" id="dtl" placeholder="Description"></textarea><br/>

			    <input type="submit" name="btn" class="btn btn-default btn-success" value="Add"/>

		    </div>
	  	</form>      
	</div>
</div>



			    	