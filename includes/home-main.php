<div id="home-main" style="background-image: url(images/home.jpg); height:600px; 
 background-repeat: no-repeat;">
	<h1>Find restaurants based on your own requirements</h1>
	<div id="home-search">
		<form id="restaurantsearch" action="process.php" method="get">
			<select name="rest_type" id="q" >
				<option value = "null" >--Select--</option>
				<option value = 1 > Family </option>
				<option value = 2 > Friends </option>
				<option value = 3 > Couple </option>
			</select>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="hidden" name="latitude" id="latitude">
			<input type="hidden" name="longitude" id="longitude">
			<input class="btn btn-success btn-lg" onclick="getLocation()" 
				button="submit" name="btn" value="search" />
		</form>

		<script type="text/javascript">

			function getLocation(){

			    if (navigator.geolocation){
			        navigator.geolocation.getCurrentPosition(showPosition);
			    }
			}

			function showPosition(position){

				$('#latitude').val(position.coords.latitude);
				$('#longitude').val(position.coords.longitude);
			    $('#restaurantsearch').submit();

			}

		</script>

	</div>
	<?php if(!isset($_SESSION['loggedUser'])){?>	
		<div id="home-signup">
			<h2>Save restaurants and get personalized restaurant recommendations</h2>
			<a href="signup.php" class=" btn btn-success">Signup</a>
		</div>	
	<?php } ?>
</div>