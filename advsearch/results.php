<?php
if (!isset($_SESSION)) {
  session_start();
}
     //This is the results page for the advanced search

     require_once('../assets/utility/util.php');
     include '../view/header.php';

     $searchType = "";
     if ($search == 'all') {
          $searchType = "all charities";
     } else if ($search == 'type') {
          $searchType = "charities by type";
     } else if ($search == 'name')
          $searchType = "charities by name"
?>

<main class="resultsBody">
     <h2 class="pageHeading">Results of search for <?php echo $searchType; ?></h2>
     

     <?php 
     if ($search == 'type') : ?>

          <h3><?php echo $typeName['type_name']; ?></h3>

          <?php foreach ($charities as $charity): ?>
               <p><a href="<?php echo $charity['url']; ?>"><?php echo $charity['name'];?></a></p>
          <?php endforeach; 
     elseif ($search == 'name') : ?>
          <p><a href="<?php echo $charity['url']; ?>"><?php echo $charity['name']; ?></a></p>
     <?php endif; ?>

<!-- Encourage them to sign up. -->
<?php if (!isset($_SESSION['username'])): ?>
  <p>Thanks for searching for nearby charities. Take full advantage of our site by creating a user account and donate your gently used items today!</p>
<?php endif; ?>

</main>

<?php include '../view/footer.php'; ?>