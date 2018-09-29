<?php
  
  session_start();

  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];

?>
<?php include '../view/header.php'; ?>
<h1>Search Charities</h1>

<!-- form area -->
<form>
<!--   <input id='director' placeholder='Charity Type'><br> -->
  <h3>Please Select a Charity Type:</h3>
  <div>
      <select name='charity_type' id='charity_type'>
        <?php foreach ($charity_types as $charity_type): ?>
          <option value='<?php echo $charity_type['charityType_ID']; ?>'><?php echo $charity_type['type_name']; ?></option>
        <?php endforeach; ?>      
      </select>
    <input onclick='getCharitiesByType(); return false;' class='button' type="submit" value="Search By Charity Type" />
  </div>
</form>
<!-- End of form area -->

<br>

<div id="txtHint">
  <b>Charity info will be listed here...</b>
  <div>
</div>

<!-- Javascript file for ajax call -->
<script type="text/javascript" src='../assets/js/ajax.js'></script>


