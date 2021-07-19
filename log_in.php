<?php 

  include'includes/header.php';
  if(isset($_SESSION['loggedUser'])){
    header("location:userPage.php");
  }

 ?>

<div class="container" style="margin-left:300px;">
  <div class="row ">
    <div class="col-md-7">
      <h1><CENTER>LogIn Form</CENTER></h1>
      <form class="form-vertical jumbotron " method="post" action="log_in_Process.php">
      <?php
        if(isset($_SESSION['loginErr'])){
          echo "<CENTER><h2>".($_SESSION['loginErr'])."</h2></CENTER><br/>";
          unset($_SESSION['loginErr']);
        }
      ?>
        <div class="form-group ">
          <label for="username">User Name:</label>
          <input type="username" class="form-control" id="email" placeholder="Enter username" name="username"><br/>
          <label for="pwd">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
        </div>
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div><br/>
        <input type="submit" name="btn" class="btn btn-default btn-success" value="LogIn" />
      </form>      
    </div>    
  </div> 
</div>

<?php include 'includes/footer.php'; ?>
