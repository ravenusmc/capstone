<?php

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
     if ($search == 'type') :
          foreach ($charities as $charity): ?>
               <p><a href="#"><?php echo $charity['name'];?></a></p>
          <?php endforeach; 
     elseif ($search == 'name') : ?>
          <p><a href="#"><?php echo $charity['name']; ?></a></p>
     <?php endif; ?>

<!-- Put the search results here. -->

</main>

<?php include '../view/footer.php'; ?>