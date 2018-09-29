<?php
  session_start();
  
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
  
?>
<?php include '../view/header.php'; ?>

<h1>Information on Charity</h1>

<h2><?php echo $charity['name']; ?></h2>
<p><?php echo $charity['street'] . ' ' . $charity['town'] . ' ' . $charity['state']; ?></p>
<a href="">URL to Site</a>
<p>Need table for contact information!</p>

<!-- only using this div because buttons were on edge of screen-this will change! -->
<div class='container'>
  <p>Make Favorite Charity?</p>
  <form action="index.php" method="post">
    <input type="hidden" name="action" value="add_favorite_charity">
    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
    <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
    <input type='radio' name='favorite' value='y' checked>Yes<br>
    <input type='radio' name='favorite' value='n'>no<br>
    <input  type="submit" value="Make Favorite">
  </form>
</div>