<?php
  //This file will handle the functions that specifically deal with tables with charity info in them 

  function get_charity_type(){
    global $db;
    $query = "SELECT * FROM CharityType
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
  function insert_into_favorites($favorite, $charity_id) {
    global $db;
    $query = "INSERT INTO charity_favorites 
              (charity_id, favorite)
              VALUES 
              (:charity_id, :favorite)";
    $statement = $db->prepare($query);
    $statement->bindValue(':charity_id', $charity_id);
    $statement->bindValue(':favorite', $favorite);
    $statement->execute();
    $statement->closeCursor();
  }

?>    