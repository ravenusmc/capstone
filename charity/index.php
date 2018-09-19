<?php
  
  //Pulling in the databases
  require('../model/database.php');

  //Setting a default action 
  $action = filter_input(INPUT_POST, 'action');
  if ($action == NULL) {
      $action = filter_input(INPUT_GET, 'action');
      if ($action == NULL) {
          $action = 'home';
      }
  }

  //Switch statment to determine which page to go to. 
  switch ($action) {

    //This case brings the user to the home page 
    case 'home':
      include('home.php');
      break;
  }

?>