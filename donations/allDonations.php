<?php 
require('../assets/utility/util.php');
include '../view/header.php';
?>

<main class="page">
<h2 class="pageHeading">All Donations</h2>
     <?php foreach ($donations as $donation) : ?>
          <h3><?php echo $donation['created']; ?></h3>
          <h4 class="donationHeading">Donated Items</h4>
          <p class="donationList"><?php echo $donation['items_list']; ?></p>
     <?php endforeach; ?>


</main>

<?php include '../view/footer.php'; ?>
