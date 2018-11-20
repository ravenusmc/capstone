<?php 
require('../assets/utility/util.php');
include '../view/header.php';
?>

<main class="page">
<h2 class="pageHeading">All Donations</h2>
    <?php $previous_date = $donation['created']; ?>
    <?php foreach ($donations as $donation) : ?>
      <?php if ($previous_date != $donation['created']): ?>
        <h3><?php 
          $donationDate = new DateTime($donation['created']);
          $donationDate = $donationDate->format('F j, Y');
          echo $donationDate; ?></h3>
        <h4 class="donationHeading">Donated Items:</h4>
      <?php endif; ?>
          <?php $previous_date = $donation['created'] ?>
          <ul>
            <li class="donationList"><?php echo $donation['items_list']; ?></li>
          </ul>
     <?php endforeach; ?>


</main>

<?php include '../view/footer.php'; ?>