<?php 
  
  // Start the session
  session_start();

  //Pulling in the databases
  require('./model/database.php');

  //Setting up a global database variable 
  global $db;

  $message = "";

?>

<?php include 'view/header.php'; ?>
<h1>Landing Page</h1>

<?php 
  if (isset($message)){
    echo $message;
  }
?>

<div class='container'>
  <form method="post">
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input type="text" name='username' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>




<a href="charity_signup.php">Charity Sign Up</a>
<br>
<a href='user_signup.php'>User Sign Up</a>