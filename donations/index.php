<?php
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
               //$userID = $name;

               $donations = allDonations($name);
               include 'summary.php';
               break;

          case 'lastDonation':

               $donation = latestDonation($userID);

               break;
     
          case 'donateAgain':
               



     }
     
?>