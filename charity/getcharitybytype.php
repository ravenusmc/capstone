<!DOCTYPE html>
<html>
<head>
</head>
<body>

<?php 

  //This file will contain the code for the ajax call to display the charities by type. 
  
  //Pulling in the databases
  require('../model/database.php');
  require('../model/charities.php');

  //This get the response from what the user typed in. 
  $charity_id = $_GET['q'];

  //Getting the charities based on the id
  $all_charities = get_all_charities_based_on_type($charity_id);

  //Displaying the results
  foreach ($all_charities as $charity) {
    echo "<p>" . $charity['name'] . "</p>";
    echo "<p>" . $charity['street'] . ' ' . $charity['town'] . ' ' . $charity['state'] . "</p>";
  }

?>

</body>
</html>