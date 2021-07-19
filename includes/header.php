<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Recoindexons</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link href="./style/css2.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
</head>
<body id="homepage">
<div id="body-header">
	<div id="body-header-content">
		<div id="f54-logo">
			<a href="index.php"><img src="images/restaurantLogo.png" 
				alt="Restaurant Recommendations" height="100" width="100" 
				style="margin: -35px 0 0 0;">
			</a>
		</div>
		<div id="header-main-content">
			<ul id="top-header-list">
				<?php if(isset($_SESSION['loggedUser'])){ ?>
				<li><h4>Hello, <?php echo $_SESSION['loggedUser']; ?></h4></li>
				<li class="header-btn"><a href="logOut.php">Log Out</a></li>
				<?php }else{ ?>
				<li class="header-btn"><a href="log_in_process.php">Log In</a></li>
				<?php } ?>
			</ul><br>
		</div><br>
	</div>
</div>