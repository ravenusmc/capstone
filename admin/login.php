<?php
  
  // Start the session
  session_start();

  //Pulling in the databases
  require('../model/database.php');
  require('../model/users.php');

  //Setting up a global database variable 
  global $db;

  $message = "";

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = filter_input(INPUT_POST, 'username');
    $password = filter_input(INPUT_POST, 'password');

    //Getting the password from the database 
    $query = "SELECT * FROM users 
              WHERE username = :username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->execute();
    $user = $statement->fetch();
    //Setting the user_table variable to store the passwrod for the verify function
    $user_table_password = $user['password'];
    //Verifing the password from the database.
    $valid_password = password_verify($password, $user_table_password);

    if ($valid_password) {
      $user = get_one_user($username, $user_table_password);
      $_SESSION["username"] = $username;
      $_SESSION["user_id"] = $user['user_id'];
      header("location: ../charity/index.php");
      exit();
    }else {
      $message = '<label class="errorMsg">Password is Wrong!</label>';
    }

  }//Closing main conditional statement

 //starting the viewable page
 require_once('../assets/utility/util.php');
 include '../view/header.php'; ?>

<?php 
  if (isset($message)){
    echo $message;
  }
?>

<main class="page" id="loginPageContainer">
  <img src="<?php echo $fullPath; ?>assets/images/charityStones.jpg" alt="charity spelled out in stones on a Zen sand garden" class="heroImg">


<section class='container '>
  
  <form method="post" id="loginForm">
    <div class="form-group">
      <label for="exampleInputEmail1">Username</label>
      <input type="text" name='username' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username">
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary form-submit-btn">Submit</button>
    <a href="user_signup.php" id="signupLink">Not a user yet? Sign up by clicking here.</a>
  </form>
  
</section>

</main>

<?php include '../view/footer.php'; ?>