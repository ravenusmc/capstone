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


?>   
    