<?php 
require('../assets/utility/util.php');
include '../view/header.php';

$donationsArray = array();
foreach ($donations as $donation) :
     $donationDate = $donation['created'];
     $charityName = $donation['name'];
     


?>

<main class="page">
<h2 class="pageHeading">All Donations</h2>
    <?php $previous_date = $donation['created']; ?>
    <?php foreach ($donations as $donation) : ?>
      <?php if ($previous_date != $donation['created']): ?>
        <h3><?php echo $donation['created']; ?></h3>
        <h4 class="donationHeading">Donated Items:</h4>
      <?php endif; ?>
          <?php $previous_date = $donation['created'] ?>
          <p class="donationList"><?php echo $donation['items_list']; ?></p>
     <?php endforeach; ?>


</main>

<?php include '../view/footer.php'; ?>
