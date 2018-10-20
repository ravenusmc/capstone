<?php
  
  session_start();

  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
  
  //Pulling in the databases
  require('../model/database.php');
  require('../model/users.php');
  require('../model/charities.php');
  require('../model/items.php');
  require('../key.php');

  

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

      //Getting all information on the user
      $user = get_user_info($id);

      //Getting the users zip code 
      $zip = get_user_zip($name);

      //Getting the actual zip from the above query
      $zip = $zip['zip'];

      //Getting all charities based on user zip
      $all_charities = get_charity_by_zip($zip);

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
    //This action will take the user to the page to see the charities by zip
    case 'see_charity_by_zip':
      $zip = filter_input(INPUT_POST, 'zip');

      //Getting all charities by zip 
      $charities = get_charity_by_zip($zip);

      include('charity_by_zip.php');
      break; 
    //This action will take the user to the donation page 
    case 'donate_page_form':
      $charity_id = filter_input(INPUT_POST, 'charity_id');
      $user_id = filter_input(INPUT_POST, 'user_id');

      include('donate_page_form.php');
      break;
    //This action will add donations to a charity once the user submits the form 
    case 'donations_form_submitted': 
      //Creating an array to hold all of the user inputed items 
      $items = array();

      $items_list = filter_input(INPUT_POST, 'items_list');
      $user_id = filter_input(INPUT_POST, 'user_id');
      $charity_id = filter_input(INPUT_POST, 'charity_id');

      $item1 = filter_input(INPUT_POST, 'mytext');
      if (isset($item1)) {
        $items[] = $item1;
      }
      $item2 = filter_input(INPUT_POST, 'mytext2');
      if (isset($item2)) {
        $items[] = $item2;
      }
      $item3 = filter_input(INPUT_POST, 'mytext3');
      if (isset($item3)) {
        $items[] = $item3;
      }
      $item4 = filter_input(INPUT_POST, 'mytext4');
      if (isset($item4)) {
        $items[] = $item4;
      }
      $item5 = filter_input(INPUT_POST, 'mytext5');
      if (isset($item5)) {
        $items[] = $item5;
      }
      $item6 = filter_input(INPUT_POST, 'mytext6');
      if (isset($item6)) {
        $items[] = $item6;
      }

      //Getting the current time to insert into the database.
      date_default_timezone_set('US/Eastern');
      $today = date("Y-m-d G:i:s");

      //Adding the data to the donations table.
      add_donation($user_id, $items, $charity_id, $today);

      header('Location: .?action=home');
      //include('home.php');
      break;
  } 

?>