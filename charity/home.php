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
<a href="?action=add_item_form">Add Item to Donate</a>

<h2>Charities Near You:</h2>


<?php foreach ($all_charities as $charity): ?>
  <p>Charity Name: <?php echo $charity['name']; ?></p>
  <p>Address: <?php echo $charity['street'] . ' ' . $charity['town'] . ' ' . $charity['state']; ?></p>
<?php endforeach; ?> 


<hr>

<h2>Your Favorite Charities:</h2>

<?php foreach ($charities as $charity): ?>
  <p>Charity Name: <?php echo $charity['name']; ?></p>
  <p>Address: <?php echo $charity['street'] . ' ' . $charity['town'] . ' ' . $charity['state']; ?></p>
  <br>
  <form method="post">
    <input type="hidden" name="action" value="update_favorite_charity">
    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
    <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
    <button type="submit" class="btn btn-danger">unfavorite</button>
  </form>
<?php endforeach; ?> 



