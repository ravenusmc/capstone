<?php 
if (!isset($_SESSION)) {
  session_start();
}

require('model/database.php');
require('model/charities.php');
require('model/items.php');
require('model/advsearch.php');
require_once('assets/utility/util.php');
include('view/header.php'); 

$charityTypes = get_charity_type();
//$itemCategories = get_all_item_categories();
$charityNames = listAll();

 
?>

<!-- <nav class="loginLinks"> -->
<a href="admin/login.php" class="loginBtn btn" id="loginHeaderBtn">Login</a>
<a href="admin/user_signup.php" class="loginBtn btn" id="signUpHeaderBtn">Sign Up</a>
<!-- </nav> -->


<header>
     <div class="headerImg">
          <img src="<?php echo $fullPath; ?>assets/images/heartsWeb.jpg" alt="string of paper hearts" class="heroImg">
          <p class="heroText">We are here to help</p>
     </div>
     <h1 class="homePageTitle">Welcome to Charity Connection</h1>
</header>

<main class="homepageMain">

<section class="homePageSection" id="problem">
     <h2 class="homePageHeading">What's the problem?</h2>
     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus ex ac luctus auctor. Ut sed orci pharetra, cursus enim eu, imperdiet tortor. Pellentesque ante turpis, condimentum eget augue nec, viverra suscipit neque. Nam id odio sed risus consectetur tincidunt. Maecenas ligula nulla, iaculis sed tempus eu, congue facilisis nulla. Vestibulum blandit finibus volutpat. In mattis, ipsum quis hendrerit mollis, sapien velit egestas mi, ac tincidunt odio est sed enim. </p>
</section>

<section class="homePageSection" id="solution">
     <h2 class="homePageHeading">How we solve it</h2>
     <p>Nullam rhoncus nunc vitae dictum eleifend. Vestibulum faucibus lacus eget malesuada semper. Vivamus lacinia auctor enim vitae vestibulum. Duis cursus leo dictum, consequat nibh rutrum, bibendum sapien. Integer et euismod orci, vel interdum est. Integer in diam felis. Nullam eu scelerisque eros. Cras imperdiet est vel metus maximus, eu accumsan diam efficitur. Integer sed mi facilisis, blandit nulla nec, porttitor mi. Morbi dignissim eleifend quam, at euismod neque tempus ac. Proin cursus rhoncus sem porta congue.</p>
</section>

<section class="ctaSection" id="ctaSignUp">
     <h3 class="ctaHeading">Interested in donating?</h3>
     <a href="http://localhost/capstone/admin/user_signup.php" class="ctaBtn btn" id="signUpBtn">Sign up!</a>
</section>

<section class="ctaSection" id="ctaSearch"> 
     <h3 class="ctaHeading">Find charities near your area</h3>
     <form action="charity/index.php" method="post" class="">
          <input type="hidden" name="action" value="see_charity_by_zip">
          <input type="text" name='zip' placeholder="Enter your zip code" class="" id="enterAddress">
          <input type="submit" class="ctaBtn btn" value="Go!">
     </form>

     <p class="btn" id="advSearchBtn" >Advanced Search</p>
     
     <section class="advSearchHidden" id="advSearchHidden">
          <form action="advsearch/index.php" method="post" id="advSearchByType" class="advSearch">
            <input type="hidden" name="action" value="byType">
            <label for="byType">Search by Charity Type</label>
                <select name="byType">
                    <option> Choose ... </option>
                    <?php foreach ($charityTypes as $type) : ?>
                      <option value="<?php echo $type['charityType_ID'];?>"><?php echo $type['type_name']; ?></option>
                    <?php endforeach; ?>
                </select>
            <input type="submit" value="Search" class="ctaBtn btn">
          </form>

          <form action="advsearch/index.php" method="post" id="advSearchByName" class="advSearch">
            <input type="hidden" name="action" value="byName">
            <label for="byName">Search by Charity Name</label>
               <select name="byName">
                  <option> Choose ... </option>
                  <?php foreach ($charityNames as $name) : ?>
                      <option value="<?php echo $name['charity_id'];?>"><?php echo $name['name']; ?></option>
                    <?php endforeach; ?>
               </select>
            <input type="submit" value="Search" class="ctaBtn btn">
          </form>

     </section>

</section>
</main>

<script type="text/javascript" src='http://localhost/capstone/assets/js/landing.js'></script>
<?php include('view/footer.php');



