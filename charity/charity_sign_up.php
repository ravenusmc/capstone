<?php
  
    session_start();

    $name = $_SESSION["username"];

?>
<?php include '../view/header.php'; ?>

<div class='container'>

  <h1>Sign Up Charity</h1>
  
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
      <label for="charityname">Charity Name</label>
      <input type="text" name='charity_name' class="form-control" id="charityname" placeholder="Enter Charity Name">
    </div>
    <div class="form-group">
      <label for="lastName">Street</label>
      <input type="text" name='street' class="form-control" id="lastName" placeholder="Enter Street">
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
      <label for="street">zip</label>
      <input type="text" name='zip' class="form-control" id="zip" placeholder="Enter Zip">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="text" name='password' class="form-control" id="password" placeholder="Enter Password">
    </div>

    <button type="submit" name="login" class="btn btn-primary">Submit</button>

  </form>
  <!-- End of Bootstrap form -->

  <div class='login_anchor center'>
    <a href="index.php">Login Page</a>
  </div>

</div>