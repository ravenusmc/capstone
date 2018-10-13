<?php
  session_start();
  
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
?>
<?php include '../view/header.php'; ?>

<h1>Make a Donation!</h1>

<h2>Please enter the items you want to donate below:</h2>

<!-- Start of donations form -->
<form action="index.php" method="post">
  <input type="hidden" name="action" value="donations_form_submitted" />
  <input type="hidden" name="user_id" value="<?php echo $id; ?>">
  <input type="hidden" name="charity_id" value="<?php echo $charity_id; ?>">
  <textarea placeholder='Comment' type='textarea' rows="4" cols="50" name='items_list' required>&nbsp;
  </textarea>
  <input type="submit" value="Add Donation" />
</form>
<!-- End of donations form -->