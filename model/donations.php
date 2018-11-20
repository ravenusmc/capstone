<?php

//This file will house the donations summary SQL functions

function allDonations($userID) {
     global $db;
     $query = 'SELECT donation_id, user_id, items_list, d.charity_id, created, name, url FROM donations d
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

function getLatestEntry($userID) {
     global $db;
     $query = 'SELECT * FROM donations
               WHERE user_id = :userID
               ORDER BY donation_id DESC
               LIMIT 1';
     $statement = $db->prepare($query);
     $statement->bindValue(':userID', $userID);
     $statement->execute();
     $lastID = $statement->fetch();
     $statement->closeCursor();
     return $lastID;
}

function latestDonation($userID, $lastDate) {
     global $db;
     $query = 'SELECT d.user_id, items_list, d.charity_id, email, name, url, created
               FROM donations d
               JOIN users u ON d.user_id = u.user_id
               JOIN charities c ON d.charity_id = c.charity_id
               WHERE d.user_id = :userID AND 
                    created = :lastDate';
     $statement = $db->prepare($query);
     $statement->bindValue(':userID', $userID);
     $statement->bindValue(':lastDate', $lastDate);
     $statement->execute();
     $lastDonation = $statement->fetchAll();
     $statement->closeCursor();
     return $lastDonation;
     
}


?>