<?php 

  //This file deals with all of the database calls dealing with only the users table 

  //This function will get one user by username and password from the database 
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

  function get_user_zip($name) {
    global $db;
    $query = "SELECT zip FROM users 
            WHERE username = :username";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $name);
    $statement->execute();
    $zip = $statement->fetch();
    $statement->closeCursor();
    return $zip;
  }

  function get_user_info($id) {
    global $db;
    $query = "SELECT * FROM users 
            WHERE user_id = :user_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $id);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user;
  }




?>