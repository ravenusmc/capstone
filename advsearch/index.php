<?php 
     // This is the controller for the advanced search results

require_once('../assets/utility/util.php');
require_once('../model/database.php');
require_once('../model/advsearch.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
     $action = filter_input(INPUT_GET, 'action');
     if ($action == NULL) {
          $action = 'listAll';
     }
}

switch ($action) {
     case 'listAll':
          // get all the charities listed in alphabetical order
          $charities = allCharities();
          $search = "all";
          include('results.php');
          break;
     
     case 'byType':
          // get the charities listed by type
          $typeID = filter_input(INPUT_POST, 'byType', FILTER_VALIDATE_INT);

          if ($typeID == NULL) {
               $errorMsg = "";
               include('../errors/error.php');
               break;
          } else {
               $charities = charitiesByType($typeID);
               $search = "type";
               include('results.php');
               break;
          }

     case 'byItems':
          $itemID = filter_input(INPUT_POST, 'items', FILTER_VALIDATE_INT);

          if ($itemID == NULL) {
               $errorMsg = "";
               include('../errors/error.php');
               break;
          } else {
               $charities = charitiesByItems($itemID);
               $search = "itemcat";
               include('results.php');
               break;
          }
}





?>