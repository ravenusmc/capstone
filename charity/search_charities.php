<?php
  
  session_start();

  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];

?>
<?php include '../view/header.php'; ?>
<h1>Search Charities</h1>

<!-- form area -->
<form>
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

<!-- This form area will display a charity by location -->
<section>
  <!-- form area -->
  <form>
    <h3>Please Select a Charity Location:</h3>
    <div>
      <input> 
      <input onclick='getCharitiesByType(); return false;' class='button' type="submit" value="Search By Charity Type" />
    </div>
  </form>
  <!-- End of form area -->

  <br>

  <div id="txtHint">
    <b>Charity info will be listed here...</b>
    <div>
  </div>

</section>
<!-- End of search by charity by location form -->

<!-- Javascript file for ajax call -->
<script type="text/javascript" src='../assets/js/ajax.js'></script>


