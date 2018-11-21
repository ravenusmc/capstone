<?php
  if (!isset($_SESSION)) {
    session_start();
  }
   
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];

  require('../assets/utility/tags.php');
  require('../key.php');
  require('../assets/utility/util.php');
  include '../view/header.php'; 
?>
<link rel="stylesheet" type="text/css" href="../assets/css/test.css">
 
<main class="page" id="singleCharity">
  <h2 class="pageHeading">Information on Charity</h2>

   <div id="map"></div>

  <section id="charityInfo">
    <h3><a href="<?php echo $charity['url']; ?>"><?php echo $charity['name']; ?></a></h3>
    <p><?php echo $charity['street'] . '<br>' . $charity['town'] . ', ' . $charity['state']; ?></p>
    <?php $text = addTags($charity['description']);
    echo $text;?>
  
  <!-- only using this div because buttons were on edge of screen-this will change! -->
  <section id="formBtns">
    <?php if (isset($name)): ?>
      
      <form action="index.php" method="post" class="inlineBtns">
        <input type="hidden" name="action" value="add_favorite_charity">
        <input type="hidden" name="user_id" value="<?php echo $id; ?>">
        <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
        
        <button type="submit" class="btn ctaBtn">Make Favorite</button>
      </form>

      <form method="post" class="inlineBtns">
          <input type="hidden" name="action" value="donate_page_form">
          <input type="hidden" name="user_id" value="<?php echo $id; ?>">
          <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
          <button type="submit" class="btn ctaBtn">Donate</button>
          </form>
    <?php endif; ?>
  </section><!-- end the form buttons -->
  </section><!-- end the information section -->
  </main>


<!-- Start of Google maps code -->
<script type="text/javascript">

  $(document).ready(function(){

    function initialize() {

      //This is the lat and long of the charity
      var charity_latitude = Number('<?php echo $charity['latitude']; ?>')
      var charity_longitude = Number('<?php echo $charity['longitude']; ?>')

      //This is the lat and long of the user. 
      var user_latitude = Number('<?php echo $user['latitude']; ?>')
      var user_longitude = Number('<?php echo $user['longitude']; ?>')

      var markers = [
          ['User', user_latitude, user_longitude, ('http://maps.google.com/mapfiles/ms/icons/green-dot.png')],
          ['<?php echo $charity['name']; ?>', charity_latitude, charity_longitude, ('http://maps.google.com/mapfiles/ms/icons/red-dot.png') ]
      ]

      var chairtyLatLng = {lat: Number('<?php echo $charity['latitude']; ?>'), lng: Number('<?php echo $charity['longitude']; ?>') };

      var map = new google.maps.Map(document.getElementById('map'), {
            center: chairtyLatLng,
            zoom: 12
      });

      for (var i = 0; i < markers.length; i++){
          var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
          var marker = new google.maps.Marker({
            position: position,
            icon: markers[i][3],
            map: map
          })
      }

    }
    
    google.maps.event.addDomListener(window, 'load', initialize); 

  });
  

  </script>
  <!-- End of Google maps Code -->

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api_key ?>"async defer></script>

<?php include '../view/footer.php'; ?>