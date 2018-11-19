<?php 
/*This is the file for the final summary page. Should include
     -- the date of the donation
     -- user's name
     -- charity name (include a link to the charity's website)
     -- list of donated items they entered
     -- a "Thank you for donating" message, including "the charity will contact you to schedule a day/time for pickup"
     -- a "Print for your tax records" link (can create a print-ready donation css list)

     What we need from the database:
     * username
     * charity name (with url of charity)
     * donation list
     * date of donation submission
     * user email

*/
if (!isset($_SESSION)) {
     session_start();
   }
   
require('../assets/utility/util.php');
include '../view/header.php';

$date = new DateTime($donation[0]['created']);
$date = $date->format('F j, Y');

?>

<main class="page">

<h2 class="pageHeading">Thank you for your donation!</h2>

<section id="summary">

    <h3>Donated to: <a href="<?php echo $donation[0]['url'];?>"><?php echo $donation[0]['name']; ?></a></h3>
    <p class="donationP" id="donationDate"><?php echo $date; ?></p>
      <ul><?php foreach ($donation as $d) : ?>
        <li id="donationItems" class="donationP"><?php echo $d['items_list']; ?></li>
      <?php endforeach; ?></ul>

    <p class="instructions"><?php echo $donation[0]['name']; ?> will contact you at <?php echo $donation[0]['email']; ?> with a date and time for pickup. Please go to the <a href="<?php echo $donation[0]['url']; ?>"><?php echo $donation[0]['name']; ?></a>  website if you have any questions.</p>

</section>

</main>

<?php include '../view/footer.php'; ?>