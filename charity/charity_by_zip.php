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

<main class="page">
<h2 class="pageHeading">Charity By zip</h2>


<?php if ($charities) {
      foreach ($charities as $charity): ?>
        <h3><a href="#"><?php echo $charity['name']; ?></a></h3>
        <p><?php echo $charity['street'] . ' ' . $charity['town'] . ' ' . $charity['state'] . ' ' . $charity['zip'] ?></p>
        <form action="index.php" method="post">
          <input type="hidden" name="action" value="see_single_charity">
          <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
          <button type="submit" class="btn ctaBtn">More Info</button>
        </form>
      <?php endforeach; 
} else { ?>
    <p>We have no charities in your zip code.</p>
    <p><a href="../index.php">Try another zip code?</a></p>
<?php }  ?>

<?php if (!isset($_SESSION['username'])): ?>
  <p>Thanks for searching for nearby charities. Take full advantage of our site by creating a user account and donate your gently used items today!</p>
<?php endif; ?>
</main>
<?php include '../view/footer.php'; ?>
