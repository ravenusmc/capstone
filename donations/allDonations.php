<?php 
require('../assets/utility/util.php');
include '../view/header.php';
?>

<main class="page">
<h2 class="pageHeading">All Donations</h2>
    <?php $previous_date = $donation['created']; ?>
    <section class="allDonationList">
    <?php foreach ($donations as $donation) : ?>
    
      <?php if ($previous_date != $donation['created']): ?>
        <h3><?php 
          $donationDate = new DateTime($donation['created']);
          $donationDate = $donationDate->format('F j, Y');
          echo $donationDate; ?></h3>
          <h4><a href="<?php echo $donation['url']; ?>"> <?php echo $donation['name']; ?></a></h4>
        <h5 class="donationHeading">Donated Items:</h5>
      <?php endif; ?>
          <?php $previous_date = $donation['created'] ?>
          <ul>
            <li class="donationList"><?php echo $donation['items_list']; ?></li>
          </ul>
          
     <?php endforeach; ?>
     <br>
     </section>

</main>

<?php include '../view/footer.php'; ?>