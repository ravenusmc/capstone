<?php
  //This file will handle the functions that specifically deal with tables with charity info in them 

  function get_charity_type(){
    global $db;
    $query = "SELECT * FROM CharityType";
    $statement = $db->prepare($query);
    $statement->execute();
    $charity_types = $statement->fetch();
    $statement->closeCursor();
    return $charity_types;
  }


?>   
    