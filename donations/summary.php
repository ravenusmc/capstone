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

require('../assets/utility/util.php');
include '../view/header.php';
?>

<main class="page">

<h2 class="pageHeading">Thank you for your donation!</h2>

<section id="summary">

<!-- * donations list
     * charity chosen to donate to
     * date of donation scheduling submission
     * username
-->

<p><!--charity name--> will contact you at <!-- user email --> with a date and time for pickup. Please go to the <!-- charity name with url --> website if you have any questions.</p>

</section>

</main>

<?php include '../view/footer.php'; ?>