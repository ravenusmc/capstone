<?php
  
  session_start();

  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
  
  //Pulling in the databases
  require('../model/database.php');
  require('../model/charities.php');
  require('../model/items.php');

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

      //Getting all the favorite charities for the user 
      $charities = get_favorite_charities($id);
      
      //This line will get all of the favorite charities from the user 
      include('home.php');
      break;
    //This case will bring the ADMIN user ONLY to the charity sign up page 
    case 'charity_sign_up':
      $charity_types = get_charity_type();
      include('charity_sign_up.php');
      break;
    //This case will bring the user to the search charity page 
    case 'search_charities':
      $charity_types = get_charity_type();
      include('search_charities.php');
      break;
    //This action will bring the user to the add item page 
    case 'add_item_form':
      $item_categories = get_all_item_categories();
      include('add_item.php');
      break;
    //This action will add an item to the items table 
    case 'add_item':

      //Getting the user input 
      $user_id  = filter_input(INPUT_POST, 'user_id');
      $item_name  = filter_input(INPUT_POST, 'item_name');
      $category_type = filter_input(INPUT_POST, 'category_type');

      //Adding a new item to the items table 
      add_new_item($item_name, $category_type, $user_id);
      
      include('home.php');
      break;
    //This action will allow the user to see charities based on the items they've donated 
    case 'see_charities':

      //Getting the user id 
      $user_id  = filter_input(INPUT_POST, 'user_id');

      //Getting all the items based on the user 
      $items = get_items_charities_each_user($user_id);

      include('see_charities.php');
      break;
    //This action will allow the user to see information on an individual charity 
    case 'see_single_charity':
      $charity_id = filter_input(INPUT_POST, 'charity_id');

      $charity = get_single_charity($charity_id);

      include('single_charity.php');
      break; 
    //This action will make a charity a favorite 
    case 'add_favorite_charity':
      $favorite = filter_input(INPUT_POST, 'favorite');
      $charity_id = filter_input(INPUT_POST, 'charity_id');
      $user_id = filter_input(INPUT_POST, 'user_id');

      //Inserting data in user_tables
      insert_into_favorites($favorite, $charity_id, $user_id);

      include('see_charities.php');
      break;
    //This action will update a favorite charite 
    case 'update_favorite_charity':
      $user_id = filter_input(INPUT_POST, 'user_id');
      $charity_id = filter_input(INPUT_POST, 'charity_id');

      //Calling the function to change status of favorites 
      change_favorite_table($user_id, $charity_id);
      
      include('home.php');
      break;
  } 

?>