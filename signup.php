<?php include'includes/header.php'; ?>

<div class="container" style="margin-left: 300px;">
  <div class="row">
    <div class="col-md-7">
      <h1><CENTER>Create Account</CENTER> </h1>
      <?php
        if(isset($_SESSION['signupErr'])){
          echo"<CENTER><h2>". ($_SESSION['signupErr'])."</h2></CENTER>";
          unset($_SESSION['signupErr']);
        }
      ?>
      <form class="form-vertical jumbotron" method="post" action="signup_process.php">
        <div class="form-group">
          <label for="username"> User Name:</label>
          <input type="text" class="form-control" id="email" placeholder="Enter username" name="username"><br/>
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password"><br/>
          <label for="con_password">Confirm Password:</label>
          <input type="password" class="form-control" id="pwd" placeholder="Confirm-Password" name="con_password"><br/>
          <input type="submit" name="btn" class="btn btn-default btn-success" value="Sign Up"/>
        </div>
      </form>      
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
