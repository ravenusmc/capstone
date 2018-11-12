<?php
  if (!isset($_SESSION)) {
    session_start();
  }
  
  if (isset($_SESSION['username'])) {
    $name = $_SESSION['username'];
  }
  
  
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
  <title>Charity Connection</title>
  
  
  
 <!-- Boostrap CSS  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
 
 <!-- FontAwesome icon fonts for Bootstrap -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- typekit fonts for body and headers; Ministry and Matrix II -->
  <link rel="stylesheet" href="https://use.typekit.net/peb4ved.css">
  
  <!-- Custom styles overriding Bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?php echo $fullPath; ?>assets/css/style.css" >

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  
  <!-- Dynamic loading for donations -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  
  <!-- LeafJS links -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.4/dist/leaflet.css"
   integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
   crossorigin=""/>
  <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
   
</head>

<body>
<div id="skip"><a href="#pageMain">Skip to Main Content</a></div>

<nav class="navbar navbar-expand-lg navbar-light bg-yellow" id="mainNavbar">
  <a class="navbar-brand" href="<?php echo $fullPath; ?>index.php"><img src="<?php echo $fullPath; ?>assets/images/logo-blue-text.svg" class="logoNav" alt="Charity Connection Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="mainMenu">
  <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link nav_bar_link" href="<?php echo $fullPath; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_bar_link" href="<?php echo $fullPath; ?>admin/about.php">About</a>
        </li>
      <?php if (isset($name)): ?>
        <?php if ($name == 'admin'): ?>
          <li class="nav-item">
            <a class="nav-link nav_bar_link" href="?action=charity_sign_up">Sign Up Charity</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link nav_bar_link" href="<?php echo $fullPath; ?>charity/index.php?">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_bar_link" href="<?php echo $fullPath; ?>charity/logout.php">Logout</a>
        </li>
      </ul>
    <?php endif; ?>
  </div>
</nav>