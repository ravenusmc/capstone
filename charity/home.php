<?php
  session_start();
  
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
 
?>
<?php include '../view/header.php'; ?>


<h1>HOME</h1>

<a href="?action=search_charities">Search Charities</a>
<br>
<a href="?action=add_item">Add Item to Donate</a>

