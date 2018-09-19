<?php 

  //This file deals with all of the database calls dealing with only the users table 
  function get_one_user($username, $password){
    global $db;
    $query = "SELECT * FROM users 
            WHERE userName = :username AND 
            password = :password";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $username);
    $statement->bindValue(':password', $password);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user; 
  }




?>