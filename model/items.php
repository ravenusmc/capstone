<?php 
  
  //This file handles all the code dealing with the items tables 

  function get_all_item_categories() {
    global $db;
    $query = "SELECT * FROM itemCategories";
    $statement = $db->prepare($query);
    $statement->execute();
    $item_categories = $statement->fetchAll();
    $statement->closeCursor();
    return $item_categories;
  }

  //This function will add a new item to the database 
  function add_new_item($item_name, $category_type, $user_id){
    global $db;
    $query = 'INSERT INTO items
                  (item_name, itemCategory_ID, user_id)
                VALUES
                  (:item_name, :itemCategory_ID, :user_id)';
    $statement = $db->prepare($query);
    $statement->bindValue(':item_name', $item_name);
    $statement->bindValue(':itemCategory_ID', $category_type);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $statement->closeCursor();
  }

  //This function will get items based on the user 
  function get_items_based_on_user($user_id) {
    global $db;
    $query = "SELECT * FROM items 
              WHERE user_id = :user_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
  }

?>