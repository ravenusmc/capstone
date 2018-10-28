<?php
  
    session_start();

    require('../key.php');

    $name = $_SESSION["username"];

    //This code will submitting a charity to the charities table. 
    if (isset($_POST["login"])) {

      $charity_name = filter_input(INPUT_POST, 'charity_name');
      $street = filter_input(INPUT_POST, 'street');
      $town = filter_input(INPUT_POST, 'town');
      $state = filter_input(INPUT_POST, 'state');
      $zip = filter_input(INPUT_POST, 'zip');
      $password = filter_input(INPUT_POST, 'password');
      $charity_type = filter_input(INPUT_POST, 'charity_type');

      //These lines will get the latitude and longitude from google maps.
      $address = $street . ' ' . $town . ' ' . $state . ' ' . $zip;
      $prepAddr = str_replace(' ','+', $address);
      $geocode = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.$prepAddr.'&key='.$api_key);
      $output = json_decode($geocode);
      $latitude = $output->results[0]->geometry->location->lat;
      $longitude = $output->results[0]->geometry->location->lng;

      //Query to add new user to the users table
      try {
        $query = 'INSERT INTO charities
                    (name, street, town, state, zip, password, charityType_ID, latitude, longitude)
                  VALUES
                    (:name, :street, :town, :state, :zip, :password, :charityType_ID, :latitude, :longitude)'; 
        $statement = $db->prepare($query);
        $statement->bindValue(':name', $charity_name);
        $statement->bindValue(':street', $street);
        $statement->bindValue(':town', $town);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':zip', $zip);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':charityType_ID', $charity_type);
        $statement->bindValue(':latitude', $latitude);
        $statement->bindValue(':longitude', $longitude);
        $statement->execute();
        $statement->closeCursor();
      }catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>Database error: $error_message </p>";
        exit();
      }

      //Message to alert user that they signed up
      $message = '<label>Charity Added!</label>';
    }

?>
<?php 
require('../assets/utility/util.php');
include '../view/header.php'; ?>

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
    <div>
      <label>Charity Type</label>
      <select name='charity_type' id='charity_type'>
        <?php foreach ($charity_types as $charity_type): ?>
          <option value='<?php echo $charity_type['charityType_ID']; ?>'><?php echo $charity_type['type_name']; ?></option>
        <?php endforeach; ?>       
      </select>
    </div>


    <button type="submit" name="login" class="btn btn-primary">Submit</button>

  </form>
  <!-- End of Bootstrap form -->

  <div class='login_anchor center'>
    <a href="index.php">Login Page</a>
  </div>

</div>