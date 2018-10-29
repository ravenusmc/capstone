<?php

  //logout.php
  session_start();
  session_destroy();
  

  require('../assets/utility/util.php');
  include '../view/header.php';
  
?>

<main class="page">
<p id="logoutMessage">You have been logged out.</p>
<p><a href="../admin/login.php">Logged out by mistake? Log in again.</a></p>

</main>

<?php include '../view/footer.php'; ?>