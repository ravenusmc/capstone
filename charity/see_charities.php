<?php
  
  session_start();

  //Bringing in the api key for google maps
  require('../key.php');

  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];



?>
<?php include '../view/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../assets/css/see_charities.css">

<h1>See Charities</h1>

<!-- Displaying all items for the user -->
<?php foreach ($items as $item): ?>

  <h3><?php echo $item['item_name']; ?></h3>
  <p>Charity Name: '<?php echo $item['name']; ?>'</p>
  <p>Charity Type: <?php echo $item['type_name']; ?></p>
  <p><?php echo $item['street'] . ' ' . $item['town'] . ' ' . $item['state'] . ' ' . $item['street']; ?></p>

  <h3><?php echo $item['charity_id']; ?></h3>

  <div id="map_<?php echo $item['charity_id']; ?>" class='map'>
  </div>

  <!-- Start of Google maps code -->
  <script type="text/javascript">

  // $(document).ready(function(){

    function initMap() {

      let map_id = 'map_' + '<?php echo $item['charity_id']; ?>';

      //This is the lat and long of the charity
      let charity_latitude = Number('<?php echo $item['latitude']; ?>')
      let charity_longitude = Number('<?php echo $item['longitude']; ?>')

      //This is the lat and long of the user. 
      let user_latitude = Number('<?php echo $item['user_lat']; ?>')
      let user_longitude = Number('<?php echo $item['user_long']; ?>')

      var markers = [
        ['User', user_latitude, user_longitude, ('http://maps.google.com/mapfiles/ms/icons/green-dot.png')],
        ['<?php echo $item['name']; ?>', charity_latitude, charity_longitude, ('http://maps.google.com/mapfiles/ms/icons/red-dot.png') ]
      ]


      let myLatLng = {lat: user_latitude, lng: user_longitude };

      //This sets up the google map object and centers the map based on the user. 
      var map = new google.maps.Map(document.getElementById(map_id), {
          center: myLatLng,
          zoom: 12
        });

      // Create a marker and set its position.
      var marker = new google.maps.Marker({
        map: map,
        position: myLatLng
      });


      //google.maps.event.addDomListener(window, 'load', initialize);

    } 

  // });

  </script>
  <!-- End of Google maps Code -->

<?php endforeach; ?>
<!-- End of displaying items -->


<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $api_key ?>&callback=initMap"async defer></script>



























