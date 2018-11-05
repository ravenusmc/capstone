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
          $charities = listAll();
          $search = "all";
          include('results.php');
          break;
     
     case 'byType':
          // get the charities listed by type
          $typeID = filter_input(INPUT_POST, 'byType', FILTER_VALIDATE_INT);

          if ($typeID == NULL) {
               $error = "";
               include('../errors/error.php');
               break;
          } else {
               $charities = charitiesByType($typeID);
               $typeName = getCharityType($typeID);
               $search = "type";

               include('results.php');
               break;
          }

     case 'byName':
          $charityID = filter_input(INPUT_POST, 'byName', FILTER_VALIDATE_INT);

          if ($charityID == NULL) {
               $error = "";
               include('../errors/error.php');
               break;
          } else {
               $charity = charityByName($charityID);
               $search = "name";
               include('results.php');
               break;
          }
}





?>