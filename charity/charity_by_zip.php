<?php 
  session_start();
  
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
        <h3><?php echo $charity['name']; ?></h3>
        <p><?php echo $charity['street'] . ' ' . $charity['town'] . ' ' . $charity['state'] . ' ' . $charity['zip'] ?></p>
      <?php endforeach; 
} else { ?>
    <p>We have no charities in your zip code.</p>
    <p><a href="../index.php">Try another zip code?</a></p>
<?php }  ?>

</main>
<?php include '../view/footer.php'; ?>