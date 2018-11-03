<?php
if (!isset($_SESSION)) {
  session_start();
}
  
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
  
?>
<?php 
require('../assets/utility/util.php');
include '../view/header.php'; ?>


 <form action='index.php' method='post'>

    <input type="hidden" name="action" value="see_charities" />
    <input type="submit" value="See Charities" />

  </form>

  <script type="text/javascript" src='../assets/js/ajax.js'></script>