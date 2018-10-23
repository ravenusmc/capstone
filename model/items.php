<?php 
  
  //This file handles all the code dealing with the items tables 

  function get_all_item_categories() { //using this in landing page
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
  // function get_items_based_on_user($user_id) {
  //   global $db;
  //   $query = "SELECT * FROM items 
  //             WHERE user_id = :user_id";
  //   $statement = $db->prepare($query);
  //   $statement->bindValue(':user_id', $user_id);
  //   $statement->execute();
  //   $items = $statement->fetchAll();
  //   $statement->closeCursor();
  //   return $items;
  // }

  //This function will get the items and charities for each user 
  function get_items_charities_each_user($user_id){
    global $db;
    $query = "SELECT u.latitude as 'user_lat', u.longitude as 'user_long', c.charity_id, i.item_name, ct.type_name, c.name, c.street, c.town, c.state, c.zip, c.latitude, c.longitude FROM items i
              JOIN users u on u.user_id = i.user_id
              JOIN itemCategories ic on ic.itemCategory_ID = i.itemCategory_ID
              JOIN charityAndItemsTable cit on ic.itemCategory_ID = cit.itemCategory_ID
              JOIN charities c on c.charityType_ID = cit.charityType_ID
              JOIN CharityType ct on ct.charityType_ID = c.charityType_ID
              WHERE i.user_id = :user_id
              ORDER BY item_name;";
    $statement = $db->prepare($query);
    $statement->bindValue(':user_id', $user_id);
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
  }

?>