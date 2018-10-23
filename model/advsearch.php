<?php

//This file will house the advanced search SQL functions


//get all the charities in alpha order
function listAll() {
     global $db;
     $query = 'SELECT * from charities
               ORDER BY name ASC';
     $statement = $db->prepare($query);
     $statement->execute();
     $charities = $statement->fetchAll();
     $statement->closeCursor();
     return $charities;
}

function charitiesByType($charityType) {
     global $db;
     $query = 'SELECT name from charities
               WHERE charityType_ID = :charityType';
     $statement = $db->prepare($query);
     $statement->bindValue(':charityType', $charityType);
     $statement->execute();
     $charities = $statement->fetchAll();
     $statement->closeCursor();
     return $charities;
}

function charitiesByItems($itemCategory) {
     global $db;
     $query = '';
     $statement = $db->prepare($query);
     $statement->bindValue(':item', $itemCategory);
     $statement->execute();
     $charities = $statement->fetchAll();
     $statement->closeCursor();
     return $charities;
}

?>