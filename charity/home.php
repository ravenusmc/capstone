<?php
  if (!isset($_SESSION)) {
    session_start();
  }
  
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
 

require('../assets/utility/util.php');
include '../view/header.php'; 

?>

<main class="page">


<h2 class="pageHeading">User Profile for <?php echo $name; ?></h2>

<!-- This is only here in case something is still needed on those pages -->
<!-- <a href="?action=add_item_form">Add Item to Donate</a>
<p>The above two links will probably change/go away</p> -->


<section id="nearbyCharities">

<!-- Map Code -->
<div id="mapid"></div>
<!-- End of Map Code -->

<div id="nearbyList">
  <h3>Charities Near You:</h3>

  <div id="list">
    <?php foreach ($all_charities as $charity): ?>
      <h4><a href="#"><?php echo $charity['name']; ?></a></h4>
      <p><?php echo $charity['street'] . ' ' . $charity['town'] . ' ' . $charity['state']; ?></p>
      <form method="post">
        <input type="hidden" name="action" value="donate_page_form">
        <input type="hidden" name="user_id" value="<?php echo $id; ?>">
        <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
        <button type="submit" class="btn ctaBtn">Donate</button>
      </form>
      <form action="index.php" method="post">
        <input type="hidden" name="action" value="see_single_charity">
        <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
        <button type="submit" class="btn ctaBtn">More Info</button>
      </form>
    <?php endforeach; ?> 
  </div>
</div>

</section>

<section id="favCharities">
<h3>Your Favorite Charities:</h3>

<div id="favList">
<?php foreach ($charities as $charity): ?>
  <p class="charityName"><?php echo $charity['name']; ?></p>
  <p><?php echo $charity['street'] . ' ' . $charity['town'] . ' ' . $charity['state']; ?></p>
  <br>  
  <form method="post">
    <input type="hidden" name="action" value="donate_page_form">
    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
    <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
    <button type="submit" class="btn btn-primary">Donate</button>
  </form>
  <br>
  <form action="index.php" method="post">
    <input type="hidden" name="action" value="see_single_charity">
    <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
    <button type="submit" class="btn ctaBtn">More Info</button>
  </form>
  <form method="post">
    <input type="hidden" name="action" value="update_favorite_charity">
    <input type="hidden" name="user_id" value="<?php echo $id; ?>">
    <input type="hidden" name="charity_id" value="<?php echo $charity['charity_id']; ?>">
    <button type="submit" class="btn btn-danger">unfavorite</button>
  </form>
<?php endforeach; ?> 
</div>
<div id="favMaps">
<script type="text/javascript" src='../assets/js/key.js'></script>
<!-- Start of code to add map to page -->
<script type="text/javascript">
  
  var user_longitude = Number('<?php echo $user['longitude']; ?>')
  var user_latitude = Number('<?php echo $user['latitude']; ?>')
  var mymap = L.map('mapid').setView([user_latitude, user_longitude], 15);


  var myIcon = L.icon({
    iconUrl: '../assets/images/blueMarker.png',
    iconSize: [38, 60],
    iconAnchor: [22, 94],
    popupAnchor: [-3, -76],
    shadowSize: [68, 95],
    shadowAnchor: [22, 94]
  });
  
  var marker = L.marker([user_latitude, user_longitude], {icon: myIcon}).addTo(mymap);

  L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=' + key, {
      attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
      maxZoom: 11,
      id: 'mapbox.streets',
      accessToken: 'your.mapbox.access.token'
  }).addTo(mymap);

  count = 0
  <?php foreach ($all_charities as $charity): ?>
    var charity_latitude = Number('<?php echo $charity['latitude']; ?>');
    var charity_longitude = Number('<?php echo $charity['longitude']; ?>');
    var marker = L.marker([charity_latitude, charity_longitude]).addTo(mymap);
    count ++;
  <?php endforeach; ?>

</script>
<!-- End of code to add map to page -->
</div>
</section>


<?php include '../view/footer.php'; ?>
