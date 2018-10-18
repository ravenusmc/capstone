<?php
  //session_start();
  
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  //$name = $_SESSION["username"];
  // $name = 'Hello World!';
  //$id = $_SESSION["user_id"];
  // $id = 'MyMyselfandI';

 //$doc_root = $_SERVER['DOCUMENT_ROOT'];
 $doc_root = 'localhost/';
 $uri = $_SERVER['REQUEST_URI'];
 $dirs = explode('/', $uri);
 //$app_dirs = $dirs[1] . '/';
 $app_dirs = 'capstone/';
 //$app_path = $doc_root . $app_dirs;
 $app_path = 'localhost/capstone/';

 set_include_path($app_path);
 
//echo $app_path;

  
?>
<!DOCTYPE html>
<html>
<!-- the head section -->
<head>
  <title>Charity Connection</title>
  <!-- Bootstrap CSS -- taken out because of conflicts with the later one-->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous"> -->
  
  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
  <!-- Missing one from the Bootstrap site - popper.js; is this left out on purpose? -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   
  
 <!-- This is the Boostrap CSS on the site under Get Started, and is a newer version... -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
 
 <!-- FontAwesome icon fonts for Bootstrap -->
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- typekit fonts for body and headers; Ministry and Matrix II -->
  <link rel="stylesheet" href="https://use.typekit.net/peb4ved.css">
  
  <!-- Custom styles overriding Bootstrap -->
  <link rel="stylesheet" type="text/css" href="http://localhost/capstone/assets/css/style.css" >
  
  <!-- Dynamic loading for donations? -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<body>
<div id="skip"><a href="#pageMain">Skip to Main Content</a></div>

<nav class="navbar navbar-expand-lg navbar-light bg-yellow">
  <a class="navbar-brand" href="index.php"><img src="http://localhost/capstone/assets/images/logo-blue-text.svg" class="logoNav" alt="Charity Connection Logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainMenu" aria-controls="mainMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><br></span>
  </button>

  <div class="collapse navbar-collapse" id="mainMenu">
  <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link nav_bar_link" href="http://localhost/capstone/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_bar_link" href="http://localhost/capstone/admin/about.php">About</a>
        </li>
      <?php if (isset($name)): ?>
        <?php if ($name == 'admin'): ?>
          <li class="nav-item">
            <a class="nav-link nav_bar_link" href="?action=charity_sign_up">Sign Up Charity</a>
          </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link nav_bar_link" href="http://localhost/capstone/charity/home.php">Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link nav_bar_link" href="http://localhost/capstone/charity/logout.php">Logout</a>
        </li>
      </ul>
    <?php endif; ?>
  </div>
</nav>