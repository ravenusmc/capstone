<?php 

  session_start();

  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];


?>
<?php if (isset($name)): ?>
  <?php include '../view/header.php'; ?>
  <h1>About Page</h1>
<?php endif; ?>