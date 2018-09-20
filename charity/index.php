<?php
  
  //Pulling in the databases
  require('../model/database.php');
  require('../model/charities.php');

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
    //This case will bring the user to the search charity page 
    case 'search_charities':
      $charity_types = get_charity_type();
      include('search_charities.php');
      break;
    //This action will bring the user to the add item page 
    case 'add_item':
      include('add_item.php');
      break;
  }

?>