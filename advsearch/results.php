<?php

     //This is the results page for the advanced search

     require_once('../assets/utility/util.php');
     include '../view/header.php';

     $searchType = "";
     if ($search == 'all') {
          $searchType = "all charities";
     } else if ($search == 'type') {
          $searchType = "charities by type";
     } else if ($search == 'itemCat')
          $searchType = "charities by item category"
?>

<main class="resultsBody">
     <h2>Results of search for <?php echo $searchType; ?></h2>

     <?php foreach ($charities as $charity): ?>
          <p><a href=""><?php echo $charity['name'];?></a></p>
     <?php endforeach; ?>

<!-- Put the search results here. -->

</main>

<?php include '../view/footer.php'; ?>