<?php session_start();

  if(isset($_SESSION['admin_name'])){
    header("location:adminPage.php");
    
  }

 ?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body style="background-color:#009900;">

<div class="container" style="margin-left:300px;">
  <div class="row ">
    <div class="col-md-7">
       <h1><CENTER class="jumbotron">Admin LogIn</CENTER></h1>
  <form class="form-vertical jumbotron " method="post" action="log_in_Process.php">
    <?php
         if(isset($_SESSION['adminloginErr'])){
          echo "<CENTER><h2>".($_SESSION['adminloginErr'])."</h2></CENTER>";
          unset($_SESSION['adminloginErr']);
        }
     ?>
    <div class="form-group ">
    
      <label for="username">User Name:</label>

        <input type="username" class="form-control" id="username" placeholder="Enter username" name="username"><br/>


      <label for="password">Password:</label>

        <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
    </div>


    <div class="checkbox">

      <label><input type="checkbox" name="remember"> Remember me</label>
      
    </div><br/>
      <input type="submit" name="btn" class="btn btn-default btn-success" value="LogIn" />

    <!-- <button type="submit" name="btn" class="btn btn-default">LogIn</button> -->
  </form>
      
    </div>
    
  </div>
 
</div>

</body>
</html>