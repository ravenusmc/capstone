<?php
  
  session_start();

  //Bringing in the api key for google maps
  require('../key.php');

  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];



?>
<?php include '../view/header.php'; ?>

<h1>See Charities</h1>

<!-- Displaying all items for the user -->
<?php foreach ($items as $item): ?>

  <h3><?php echo $item['item_name']; ?></h3>
  <p>Charity Name: <?php echo $item['name']; ?></p>
  <p>Charity Type: <?php echo $item['type_name']; ?></p>
  <p><?php echo $item['street'] . ' ' . $item['town'] . ' ' . $item['state'] . ' ' . $item['street']; ?></p>

  <!-- Start of Google maps code -->
  <script type="text/javascript">


  </script>
  <!-- End of Google maps Code -->

<?php endforeach; ?>
<!-- End of displaying items -->


<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api_key ?>">
 </script>