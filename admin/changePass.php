<?php $title = "Change Password"; ?>
<?php include 'includes/admin_header.php'; ?>

<!-- <body style="background-color: #66ff66;"> -->
	<div class="container" style="margin-left: 300px; ">
	  <div class="row">
	    <div class="col-md-7">
	      <h1><CENTER class="jumbotron">Change Password</CENTER> </h1>
	      <?php
	         if(isset($_SESSION['changepassErr'])){
	    
	          echo"<CENTER><h2>". ($_SESSION['changepassErr'])."</h2></CENTER>";
	    
	          unset($_SESSION['changepassErr']);
	        }
	     ?>
		<form class="form-vertical jumbotron" method="post" action="changepassProcess.php" onsubmit="return validate_password()">

		    <div class="form-group ">

			      <label for="oldpass">Old Password:</label>

				       <input id="oldpass" type="password" class="form-control" placeholder="Enter Old-Password" name="oldpass"><br/>

			      <label for="newpass">New Password:</label>
			      
				      <input id="newpass" type="password" placeholder="Enter New-Password" class="form-control" name="newpass"><br/>

			      <label for="confirmpass">Confirm Password:</label>

				      <input id="confirmpass" type="password" class="form-control" placeholder="Confirm-Password"  name="confirmpass"><br/>

				      <input type="submit" name="btn" class="btn btn-default btn-success" value="Change Password"/>
			</div>
		     
		    <!-- <button type="submit" name="btn" class="btn btn-default">Sign Up </button> -->
		</form> 

		</div>
		  
	</div>
		  
</div>

<script type="text/javascript" src="js/validate_password.js"></script>

<!-- </body> -->