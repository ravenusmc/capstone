<?php
  //All the code in this file will deal with the signup page 

  // Start a session
  session_start();

  //Pulling in the databases
  require('./model/database.php');
  global $db;

  //When the user hits the submit button this conditional statement checks to ensure everything is ok
  if (isset($_POST["login"])){
    $firstname = filter_input(INPUT_POST, 'firstname');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');
    $username = filter_input(INPUT_POST, 'username');

    echo $username;
  }

?>
<?php include 'view/header.php'; ?>
<h1>User Sign up</h1>

<div class='container'>
  <!-- Start of error handling -->
  <?php 
    if (isset($message)){
      echo $message;
    }
  ?>
  <!-- End of error handling -->

  <!-- Start of bootstrap form -->
  <form method="post">
    <div class="form-group">
      <label for="firstname">First Name</label>
      <input type="text" name='firstname' class="form-control" id="firstname" placeholder="Enter First Name" required>
    </div>
    <div class="form-group">
      <label for="lastName">Last Name</label>
      <input type="text" name='lastName' class="form-control" id="lastName" placeholder="Enter Last Name" required>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" name='email' class="form-control" id="email" placeholder="Enter Email">
    </div>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" name='username' class="form-control" id="username" placeholder="Enter Username">
    </div>
    <div class="form-group">
      <label for="street">Street</label>
      <input type="text" name='street' class="form-control" id="street" placeholder="Enter Street">
    </div>
    <div class="form-group">
      <label for="town">Town</label>
      <input type="text" name='town' class="form-control" id="town" placeholder="Enter Town">
    </div>
    <div class="form-group">
      <label for="state">State</label>
      <input type="text" name='state' class="form-control" id="state" placeholder="Enter State">
    </div>
    <div class="form-group">
      <label for="zip">Zip</label>
      <input type="text" name='zip' class="form-control" id="zip" placeholder="Enter Zip">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" name="login" class="btn btn-primary">Submit</button>
  </form>
  <!-- End of Bootstrap form -->
</div>