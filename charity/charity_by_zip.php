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

<?php foreach ($charities as $charity): ?>

  <h3><?php echo $charity['name']; ?></h3>
  <p><?php echo $charity['street'] . ' ' . $charity['town'] . ' ' . $charity['state'] . ' ' . $charity['zip'] ?></p>

<?php endforeach; ?>

</main>
<?php include '../view/footer.php'; ?>