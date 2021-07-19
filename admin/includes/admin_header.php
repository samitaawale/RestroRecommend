<?php 
  include 'config/functions.php';
  if(!isset($_SESSION['admin_name'])){

    header("location:index.php");
  }
 ?>
 <!DOCTYPE html>
 <html>
 <head>
  <title><?= $title; ?></title>
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
  <script type="text/js" src="assets/bootstrap.min.js"></script>
  <script src="assets/jquery/jquery.min.js"></script>
  <script type="text/javascript" src="../js/validate_password.js"></script>

 </head>
 <body style="background-color: #009900;">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand">
        <?php 
          if(isset($_SESSION['admin_name'])){
            echo "Hi, ".ucwords($_SESSION['admin_name']); 
        	} 
        ?>
      </a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="adminPage.php">Home</a></li>
      <li><a href="admin_list.php">Admin</a></li>
      <li><a href="users.php" >Users</a></li>
      <li><a href="restaurant.php">Restaurant</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">

      <?php 
      	if(isset($_SESSION['admin_name'])){ 
      ?>
      	<li><a href="changePass.php"><span class="glyphicon "></span> 
              Edit Password</a></li>
      	<li><a href="logOut.php"><span class="glyphicon "></span> Logout</a></li>

      <?php
      	}
       ?>
    </ul>
  </div>
</nav>