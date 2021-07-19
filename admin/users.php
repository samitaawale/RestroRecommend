<?php 

		$title = "View Users";
		include "includes/admin_header.php";

  		$sql = "SELECT id, username FROM users ORDER BY id DESC";
  		$login = query($sql);
  		$count = total_rows($login);
  		?>

  		<div class="container">
	  		<?php

	  			if(isset($_SESSION['user_action'])){
	  				echo "<h2 >{$_SESSION['user_action']}</h2>";
	  				unset($_SESSION['user_action']);

	  			}
	  		?>
	  	</div> 

	  	<CENTER class="container"><h2 style="color:#00134d;">List Of Users</h2></CENTER>

  		<div class="col-md-6 jumbotron" style="margin-left: 350px;">
				<table class="table table-striped table-responsive table-bordered">
			    <thead>
			      <tr>
			        <th>SN</th>
			        <th>Username</th>
			        <th>Action</th>
			      </tr>
			    </thead>  		
		    <tbody>
		    <?php 
  				$sn = 1;
  				if($count >= 1){
  					while ($data = fetch_data($login)) { ?>
					   <tr>
				      		<td> <?= $sn; ?> </td>
		    		        <td> <?= ucwords($data['username']); ?> </td>
					        <td> 
					        	<a href="user_delete.php?id=<?= $data['id']; ?>" 
					        	onclick="return confirm('Are you sure to delete?')">Delete</a>
					        </td>
			   	       </tr> <?php
  					$sn++;
  					}
				?>
				</tbody>
		</table>
  		</div>
  		<?php
	  		}
	  		else{

	  			echo"No members Available ! !";
	  			header("location:index.php");
	  		}


  	 	?>

  
  </body>
  </html>
