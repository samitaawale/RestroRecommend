<?php 
	session_start();
	if (!isset($_SESSION['loggedUser'])){
		header ("location:index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Resturant Recommendation</title>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
	<link href="style/css2.css" rel="stylesheet" type="text/css">
</head>
<body id="homepage" >
<div id="body-header">
	<div id="body-header-content">
		<div id="f54-logo">
			<a href="index.php"><img src="images/restaurantLogo.png" 
				alt="Restaurant Recommendations" height="100%" width="100" 
				style="margin: -35px 0 0 0;">
			</a>
		</div>
		<div id="header-main-content">
			<ul id="top-header-list">
				<li><h4>Hello, <?php echo $_SESSION['loggedUser']; ?></h4></li>
				<li class="header-btn"><a href="logOut.php">Log Out</a></li>
			</ul><br>
		</div><br>
	</div>
</div>

<?php include'includes/home-main.php'; ?>  

<div id="footer">
	<div id="footer-nav">
		<ul>
			<li><a href="faq.php">FAQ</a></li>
			<li><a href="privacy_policy.php">Privacy Policy</a></li>
			<li><a href="about_us.php">About Us</a></li>
			
		</ul>
	</div>
	<div id="footer-contact">
		<p><a id="f-c" href="contact_us.php"> Contact Us</a></p>
		<ul>
			<li><a id="f-f" href="https://www.facebook.com/" target="_blank">&nbsp;</a></li>
			<li><a id="f-t" href="https://twitter.com/" target="_blank">&nbsp;</a></li>
		</ul>
	</div>
	<div id="footer-copyright">
	<p>&copy;  Resturant Recommendator LLC</p>
	</div><br class="clear">
</div>
</body>
</html>



