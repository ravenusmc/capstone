<?php
  if (!isset($_SESSION)) {
    session_start();
  }
 
  
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $user_id = $_SESSION["user_id"];

?>
<?php 
require('../assets/utility/util.php');
include '../view/header.php'; ?>

<main class="page">
<h2 id="donationHeading">Make a Donation!</h2>
<p>Please type the item to be donated. Press the ADD MORE button to add more than one item. Press the REMOVE button to remove an item. Once you’ve entered all of the items to be donated, press SUBMIT.</p>

<div class="container">  
     
    <div class="form-group">  
      <form name="add_name" id="add_name" class="donationForm">  
        <div class="table-responsive">  
          <table class="table" id="dynamic_field">  
            <tr>  
                <input  type='hidden' name="charity_id" value="<?php echo $charity_id ?>">
                <td><input type="text" name="name[]" placeholder="Enter Item" class="form-control name_list" /></td>  
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
            </tr>  
          </table>  
          <input type="button" name="submit" id="submit" class="btn form-submit-btn" value="Submit" />  
        </div>  
      </form>  
    </div> 
</div>  
<!-- Buttons to navigate after donation is made  -->
<section id="donationFollowUp">
  <form action="../donations/index.php">
    <input type="hidden" name="action" value="lastDonation">
    <input type="submit" class="ctaBtn" value="Summary of your donation">
  </form>

  <form action="../donations/index.php">
    <input type="hidden" name="action" value="allDonations">
    <input type="submit" class="ctaBtn" value="See all your donations">
  </form>

  <form action="../charity/index.php">
    <input type="hidden" name="action" value="donateAgain">
    <input type="submit" class="ctaBtn" value="Donate to another charity">
  </form>

  <form action="../charity/index.php">
    <input type="hidden" name="action" value="home">
    <input type="submit" class="ctaBtn" value="Back to your profile">
  </form> 

</section>
</main>

<script>  
  
  $(document).ready(function(){  

        var i = 1;  

        $('#add').click(function(){  
             i++;  
             $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter item" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">Remove</button></td></tr>');  
        });  

        $(document).on('click', '.btn_remove', function(){  
             var button_id = $(this).attr("id");   
             $('#row'+button_id+'').remove();  
        });  

        $('#submit').click(function(){            
             $.ajax({  
                  url:"dynamic_input.php",  
                  method:"POST",  
                  data: $('#add_name').serialize(),  
                  success: function(data)  
                  {  
                       alert(data);  
                       $('#add_name')[0].reset();  
                  }  
             });  
        });

  });  

 </script>



<script type="text/javascript" src='../assets/js/input.js'></script>

<?php include '../view/footer.php'; ?>