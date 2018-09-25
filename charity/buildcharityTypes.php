<!-- AJAX Files do not modify -->
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
  $item_category_id = $_GET['q'];

  //Getting the charity types based on the item category 
  $all_charity_types = get_all_charity_types($item_category_id);

  // echo var_dump($all_charity_types);

  // echo $all_charity_types[1][0];

  //Displaying the results
  // foreach ($all_charity_types as $type): {
  //   echo "<p>" . $type['type_name'] . "</p>"; 
  // }

  $count = 0;
  echo "<select class='test'>";
  while ($count < count($all_charity_types)) {
    echo "<option value=" . $all_charity_types[$count][0] . ">" . $all_charity_types[$count][1] . "</option>";
    $count++;
  }
  echo '</select>';



?>

</body>
</html>