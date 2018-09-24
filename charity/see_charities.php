<?php
  
  session_start();

  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];

?>
<?php include '../view/header.php'; ?>

<h1>See Charities</h1>

<!-- Displaying all items for the user -->
<?php foreach ($items as $item): ?>

  <h3><?php echo $item['item_name']; ?></h3>
  <p><?php echo $item['name']; ?></p>

<?php endforeach; ?>
<!-- End of displaying items -->