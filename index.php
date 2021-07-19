<?php

	include'includes/header.php';
 	if(isset($_SESSION['loggedUser'])){
 		header('location:userPage.php');
 	}

	// header section ends here

	// home-main starts here
 
	include'includes/home-main.php';

 ?>

<!-- home-main ends here -->


<div id="main">
	<div id="main-body">
	</div>



<!-- 	Footer section starts here -->

<?php include'includes/footer.php'; ?>

<!-- 	Footer section ends here -->
