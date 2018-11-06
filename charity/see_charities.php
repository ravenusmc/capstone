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
include '../view/header.php'; ?>


<h1>See Charities</h1>

<!-- Displaying all items for the user -->
<?php foreach ($items as $item): ?>

  <h3><?php echo $item['item_name']; ?></h3>
  <p>Charity Name: '<?php echo $item['name']; ?>'</p>
  <p>Charity Type: <?php echo $item['type_name']; ?></p>
  <p><?php echo $item['street'] . ' ' . $item['town'] . ' ' . $item['state'] . ' ' . $item['street']; ?></p>

  <form action="index.php" method="post">
    <input type="hidden" name="action" value="see_single_charity">
    <input type="hidden" name="charity_id" value="<?php echo $item['charity_id']; ?>">
    <input class='input_style' type="submit" value="More Info">
  </form>

  <form method="post">
    <input type="hidden" name="action" value="donate_page_form">
    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
    <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
    <button type="submit" class="btn btn-primary">Donate</button>
  </form>

  <div id="map_<?php echo $item['charity_id'] . $item['item_name']; ?>" class='map'>
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

<?php endforeach; ?>
<!-- End of displaying items -->

<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api_key ?>"async defer></script>


<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api_key ?>&callback=initMap"async defer></script>




























