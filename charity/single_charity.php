<?php
  session_start();
  
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
  
?>
<?php 
require('../assets/utility/util.php');
include '../view/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../assets/css/map.css">

<h1>Information on Charity</h1>

<div id="map_<?php echo $charity['charity_id'] . $charity['item_name']; ?>" class='map'>
</div>

<h2><?php echo $charity['name']; ?></h2>
<p><?php echo $charity['street'] . ' ' . $charity['town'] . ' ' . $charity['state']; ?></p>
<a href="<?php echo $charity['url']; ?>">Link to Charity Information</a>

<!-- only using this div because buttons were on edge of screen-this will change! -->
<div class='container'>
  <?php if (isset($name)): ?>
    <p>Make Favorite Charity?</p>
    <form action="index.php" method="post">
      <input type="hidden" name="action" value="add_favorite_charity">
      <input type="hidden" name="user_id" value="<?php echo $id; ?>">
      <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
      <input type='radio' name='favorite' value='y' checked>Yes<br>
      <button type="submit" class="btn ctaBtn">Make Favorite</button>
    </form>
  <?php endif; ?>
</div>

<!-- Start of Google maps code -->
<script type="text/javascript">

  $(document).ready(function(){

    function initialize() {

      var map_id = 'map_' + '<?php echo $charity['charity_id']; ?>' + '<?php echo $charity['item_name']; ?>';

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

      var map = new google.maps.Map(document.getElementById(map_id), {
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