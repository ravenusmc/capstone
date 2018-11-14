<?php

//This file will house the donations summary SQL functions

function allDonations($userID) {
     global $db;
     $query = 'SELECT donation_id, user_id, items_list, d.charity_id, created, name FROM donations d
               JOIN charities c
                    ON c.charity_id = d.charity_id
               WHERE user_id = :userID
               ORDER BY created DESC';
     $statement = $db->prepare($query);
     $statement->bindValue(':userID', $userID);
     $statement->execute();
     $donations = $statement->fetchAll();
     $statement->closeCursor();
     return $donations;
}

function latestDonation($userID) {

}


?>