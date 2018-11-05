<?php
     //This is the controller for the donations summary

     $action = filter_input(INPUT_POST, 'action');
     if ($action == NULL) {
          $action = filter_input(INPUT_GET, 'action');
          if ($action == NULL) {
               $action = 'donationList';
          }
     }

     switch($action) {
          case 'all':
               $userID = filter_input(INPUT_POST, 'userID', FILTER_VALIDATE_INT);
               $



     }
     
?>