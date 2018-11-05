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
     <p>You’ve cleaned out your closets and discovered you have a few or several gently used and loved items you would like to see go to a good home. Looking up charities that accept gently used donations within your area can be time consuming and isn’t as easy as it should be, especially if you’re looking to donate to charities such as Women and Children’s shelters which are often difficult to locate for security reasons.</p>
</section>

<section class="homePageSection" id="solution">
     <h2 class="homePageHeading">How we solve it</h2>
     <p><span class='companyName'>Charity Connection</span> identifies non-profit charities located within a 10-mile radius of your location. Once the user selects the types of items to be donated, nearby charities that accept those items are displayed to you. It’s that simple! If you need a donation summary for tax purposes we’ve got you covered. Feel free to print your donation summary for your records. Using <span class='companyName'>Charity Connection</span> is easy and free! Start by creating an account today!</p>
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



