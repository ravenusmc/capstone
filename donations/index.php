<?php
     if (!isset($_SESSION)) {
     session_start();
     }
  
   
//This variable will be a flag to verify if the user is currently in a session or just browsing. 
   $name = $_SESSION["username"];
   $user_id = $_SESSION["user_id"];

     
   
//This is the controller for the donations summary

     $action = filter_input(INPUT_POST, 'action');
     if ($action == NULL) {
          $action = filter_input(INPUT_GET, 'action');
          if ($action == NULL) {
               $action = 'allDonations';
          }
     }

     switch($action) {
          case 'allDonations':
               

               $donations = allDonations($user_id);
               include 'summary.php';
               break;

          case 'lastDonation':

               $donation = latestDonation($userID);

               break;
     
          case 'donateAgain':
               



     }
     
?>