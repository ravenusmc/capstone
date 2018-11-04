<?php
  //This file will handle the functions that specifically deal with tables with charity info in them 

  function get_charity_type(){ //using this in landing page
    global $db;
    $query = "SELECT * FROM charitytype
    ORDER BY charityType_ID";
    $statement = $db->prepare($query);
    $statement->execute();
    $charity_types = $statement->fetchAll();
    $statement->closeCursor();
    return $charity_types;
  }

    function get_all_charities_based_on_type($charity_id) {
    global $db;
    $query = "SELECT * FROM charities 
              WHERE charityType_ID = :charity_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':charity_id', $charity_id);
    $statement->execute();
    $all_charities = $statement->fetchAll();
    $statement->closeCursor();
    return $all_charities;
  }

  function get_all_charity_types($item_category_id) {
    global $db;
    $query = "SELECT ct.charityType_ID, ct.type_name FROM charityAndItemsTable ci 
              JOIN CharityType ct on ci.charityType_ID = ct.charityType_ID
              WHERE itemCategory_ID = :itemCategory_ID";
    $statement = $db->prepare($query);
    $statement->bindValue(':itemCategory_ID', $item_category_id);
    $statement->execute();
    $all_charity_types = $statement->fetchAll();
    $statement->closeCursor();
    return $all_charity_types;
  }

  //This function will get a single charity based on an idea
  function get_single_charity($charity_id) {
    global $db;
    $query = "SELECT * FROM charities 
              WHERE charity_id = :charity_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':charity_id', $charity_id);
    $statement->execute();
    $charity = $statement->fetch();
    $statement->closeCursor();
    return $charity;
  }

  //This function inserts data into the charity favorites table 
  function insert_into_favorites($favorite, $charity_id, $user_id) {
    global $db;
    $query = "INSERT INTO charity_favorites 
              (charity_id, favorite, user_id)
              VALUES 
              (:charity_id, :favorite, :user_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(':charity_id', $charity_id);
    $statement->bindValue(':favorite', $favorite);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
  }

  //This function gets all of the favorite charities for each user
  function get_favorite_charities($user_id) {
    global $db;
    $query = "SELECT * FROM charity_favorites cf
              JOIN charities c ON c.charity_id = cf.charity_id
              WHERE cf.user_id = :user_id AND cf.favorite = 'y'";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $charities = $statement->fetchAll();
    $statement->closeCursor();
    return $charities;
  }

  //This function will update the charity_favorites table to make it go from a favorite to not a favorite
  function change_favorite_table($user_id, $charity_id) {
    global $db;
    $query = "UPDATE charity_favorites SET favorite = 'n' 
    WHERE user_id = :user_id AND charity_id = :charity_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->bindValue(':charity_id', $charity_id);
    $statement->execute();
    $statement->closeCursor();
  } 

  //This function will get a charity based on zip code 
  function get_charity_by_zip($zip) {
    global $db; 
    $query = "SELECT * FROM charities 
              WHERE zip = :zip";
    $statement = $db->prepare($query);
    $statement->bindValue(':zip', $zip);
    $statement->execute();
    $charities = $statement->fetchAll();
    $statement->closeCursor();
    return $charities;
  }

  //This function will add a donation to the donations table 
  function add_donation($user_id, $items, $charity_id, $today){
    global $db;
    for ($i = 0; $i < count($items); $i++){
      $query = "INSERT INTO donations 
              (user_id, items_list, charity_id, created)
              VALUES 
              (:user_id, :items_list, :charity_id, :created)";
      $statement = $db->prepare($query);
      $statement->bindValue(':user_id', $user_id);
      $statement->bindValue(':items_list', $items[$i]);
      $statement->bindValue(':charity_id', $charity_id);
      $statement->bindValue(':created', $today);
      $statement->execute();
      $statement->closeCursor();
    }
  }


?>    