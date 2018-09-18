<?php
  //All the code in this file will deal with the signup page 

  // Start a session
  session_start();

  //Pulling in the databases
  require('./model/database.php');
  global $db;

  $message = "";

  //When the user hits the submit button this conditional statement checks to ensure everything is ok
  if (isset($_POST["login"])){
    
    $firstname = filter_input(INPUT_POST, 'firstname');
    $lastName = filter_input(INPUT_POST, 'lastName');
    $email = filter_input(INPUT_POST, 'email');
    $username = filter_input(INPUT_POST, 'username');
    $street = filter_input(INPUT_POST, 'street');
    $town = filter_input(INPUT_POST, 'town');
    $state = filter_input(INPUT_POST, 'state');
    $zip = filter_input(INPUT_POST, 'zip');
    $password = filter_input(INPUT_POST, 'password');
    $password2 = filter_input(INPUT_POST, 'password2');

    //Hashing the password 
    $password_hashed = password_hash($password, PASSWORD_DEFAULT);

    //This SQL query checks to see if the username is in the users table.
    $query = "SELECT * FROM users WHERE 
              username = :username AND 
              password = :password";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $count = $statement->rowCount();
    //Conditional statements based on what the query returns. 
    if ($count > 0){
      $message = '<label>Username Taken!</label>';
    }else {
      //Query to add new user to the users table
      $query = 'INSERT INTO users
                  (firstname, lastname, street, town, state, zip, email, username, password)
                VALUES
                  (:firstname, :lastname, :street, :town, :state, :zip, :email, :username, :password)'; 
      $statement = $db->prepare($query); 
      $statement->bindValue(':firstname', $firstname);
      $statement->bindValue(':lastname', $lastname);
      $statement->bindValue(':street', $street);
      $statement->bindValue(':town', $town);
      $statement->bindValue(':state', $state);
      $statement->bindValue(':zip', $zip);
      $statement->bindValue(':email', $email);
      $statement->bindValue(':username', $username);
      $statement->bindValue(':password', $password_hashed);
      $statement->execute();
      $statement->closeCursor();
      //Message to alert user that they signed up
      $message = '<label>User Signed Up!</label>';
    }

  }//End of if main conditional 

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
      <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword2">Password</label>
      <input type="password" name='password2' class="form-control" id="exampleInputPassword2" placeholder="Confirm Password">
    </div>
    <button type="submit" name="login" class="btn btn-primary">Submit</button>
  </form>
  <!-- End of Bootstrap form -->
</div>