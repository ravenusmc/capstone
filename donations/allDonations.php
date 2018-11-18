<?php 
require('../assets/utility/util.php');
include '../view/header.php';
?>

<main class="page">
<h2 class="pageHeading">Your Donations</h2>
    <?php $previous_date = $donations['created']; ?>
    <?php foreach ($donations as $donation) : ?>
      <?php if ($previous_date != $donation['created']): ?>
        <section class="allDonationList">
          <h3 class="donationH3"><?php 
              $donationDate = new DateTime($donation['created']);
              $donationDate = $donationDate->format('F j, Y');
              echo $donationDate;
              ?></h3>
              <h4 class="goldHeading donationh4"><a href="<?php  echo $donation['url'];?>"><?php echo $donation['name']; ?></a></h4>
          <h5 class="donationH5">Donated Items:</h5>
        <?php endif; ?>
            <?php $previous_date = $donation['created'] ?>
            <p class="donationList"><?php echo $donation['items_list']; ?></p>
          </section>
     <?php endforeach; ?>


</main>

<?php include '../view/footer.php'; ?>
