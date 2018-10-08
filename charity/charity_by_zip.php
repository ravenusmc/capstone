<?php 
  session_start();
  
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];

?>
<?php include '../view/header.php'; ?>

<h1>Charity By zip</h1>

<?php foreach ($charities as $charity): ?>

  <h2><?php echo $charity['name']; ?></h2>
  <p><?php echo $charity['street'] . ' ' . $charity['town'] . ' ' . $charity['state'] . ' ' . $charity['zip'] ?></p>

<?php endforeach; ?>