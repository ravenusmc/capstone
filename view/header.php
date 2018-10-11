<?php
  //session_start();
  
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  //$name = $_SESSION["username"];
  // $name = 'Hello World!';
  //$id = $_SESSION["user_id"];
  // $id = 'MyMyselfandI';

 
  
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
  <title>Charity Connection</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.typekit.net/peb4ved.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css" >
</head>

<body>
<div id="skip"><a href="#pageMain">Skip to Main Content</a></div>

<nav class="navbar navbar-expand-lg navbar-light bg-yellow">
  <a class="navbar-brand" href="index.php"><img src="assets/images/logo-blue-text.svg" class="logoNav" alt="Charity Connection Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    Menu
  </button>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link nav_bar_link" href="../charity">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_bar_link" href="../admin/about.php">About</a>
        </li>
      <?php if (isset($name)): ?>
        <?php if ($name == 'admin'): ?>
          <li class="nav-item">
            <a class="nav-link nav_bar_link" href="?action=charity_sign_up">Sign Up Charity</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link nav_bar_link" href="../charity/logout.php">Logout</a>
        </li>
      </ul>
    <?php endif; ?>
  </div>
</nav>