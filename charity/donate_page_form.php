<?php
  session_start();
  
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
?>
<?php include '../view/header.php'; ?>

<h1>Make a Donation!</h1>

<h2>Please enter up to 6 items you want to donate below:</h2>

<!-- Start of donations form -->
<!-- <form action="index.php" method="post">
  <input type="hidden" name="action" value="donations_form_submitted" />
  <input type="hidden" name="user_id" value="<?php echo $id; ?>">
  <input type="hidden" name="charity_id" value="<?php echo $charity_id; ?>">
  <textarea placeholder='Comment' type='textarea' rows="4" cols="50" name='items_list' required>&nbsp;
  </textarea>
  <input type="submit" value="Add Donation" />
</form> -->
<!-- End of donations form -->

<!-- Jquery Dynamic form -->
<form action="index.php" method="post">

  <input type="hidden" name="action" value="donations_form_submitted" />
  <input type="hidden" name="user_id" value="<?php echo $id; ?>">
  <input type="hidden" name="charity_id" value="<?php echo $charity_id; ?>">
  <div class="input_fields_wrap">

    <div class='buttons'>
      <button class="add_field_button">Add More Fields</button>
<!--       <button>Submit</button> -->
    </div>

    <br>

      <div class='column_names'>
        <p>Item Name:</p>
<!--         <p class='data_column'>Data Type:</p> -->
      </div>

      <div class='main_input_div'>

        <div>
          <input placeholder='Enter Item Name' type="text" name="mytext">
        </div>
        
<!--         <div>
          <select name="data_type">
            <option value=' ' selected>Nothing</option>
            <option value='int'>Integer</option>
            <option value='varchar(30)'>String</option>
          </select>
        </div> -->
        <a href="#" class="remove_field">Remove</a>
      </div> 
  </div>
  <input type="submit" value="Add Donation" />
</form>
<!-- End of Jquery Dynamic Form -->

<script type="text/javascript" src='../assets/js/input.js'></script>