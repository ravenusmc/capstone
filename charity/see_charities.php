<?php
  if (!isset($_SESSION)) {
    session_start();
  }

  //Bringing in the api key for google maps
  require('../key.php');

  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];

?>
<?php 
require('../assets/utility/util.php');
require('../assets/utility/tags.php');
include '../view/header.php'; ?>

<main class="page">
<h2 class="pageHeading">All Charities</h2>

<!-- Displaying all items for the user -->
<?php foreach ($charities as $charity): ?>
  <section class="charitiesList">
    <h3><a href="<?php echo $charity['url']; ?>"><?php echo $charity['name']; ?></a></h3>
    <h4>Charity Type: <?php echo $charity['type_name']; ?></h4>
    <p><?php echo $charity['street'] . '<br> ' . $charity['town'] . ', ' . $charity['state'] . ' ' . $charity['zip']; ?></p>

    <form action="index.php" method="post" class="inlineBtns">
      <input type="hidden" name="action" value="see_single_charity">
      <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
      <input class='btn ctaBtn' type="submit"  value="More Info">
    </form>

    <form method="post" class="inlineBtns">
      <input type="hidden" name="action" value="donate_page_form">
      <input type="hidden" name="user_id" value="<?php echo $id; ?>">
      <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
      <button type="submit" class="btn ctaBtn">Donate</button>
    </form>
  
  <div id="map_<?php // echo $item['charity_id'] . $item['item_name']; ?>" class='map'>
  </div>



  <!-- Start of Google maps code -->
  <script type="text/javascript">

  $(document).ready(function(){

    function initialize() {

      var map_id = 'map_' + '<?php echo $item['charity_id']; ?>' + '<?php echo $item['item_name']; ?>';

      //This is the lat and long of the charity
      var charity_latitude = Number('<?php echo $item['latitude']; ?>')
      var charity_longitude = Number('<?php echo $item['longitude']; ?>')

      //This is the lat and long of the user. 
      var user_latitude = Number('<?php echo $item['user_lat']; ?>')
      var user_longitude = Number('<?php echo $item['user_long']; ?>')

      var markers = [
          ['User', user_latitude, user_longitude, ('http://maps.google.com/mapfiles/ms/icons/green-dot.png')],
          ['<?php echo $item['name']; ?>', charity_latitude, charity_longitude, ('http://maps.google.com/mapfiles/ms/icons/red-dot.png') ]
      ]

      var chairtyLatLng = {lat: Number('<?php echo $item['latitude']; ?>'), lng: Number('<?php echo $item['longitude']; ?>') };

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
  </section>
<?php endforeach; ?>
<!-- End of displaying items -->
</main>

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api_key ?>"async defer></script>


<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api_key ?>&callback=initMap"async defer></script>




























