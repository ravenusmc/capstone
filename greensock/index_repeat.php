<?php 
require('model/database.php');
require('model/charities.php');
require('model/items.php');
require_once('assets/utility/util.php');
include('view/header.php'); 

$charityTypes = get_charity_type();
$itemCategories = get_all_item_categories();

 
?>


<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>GreenSock: Repeat</title>
    
<style>
body{
	background-color:#FFFFFF;
}
#demo {
	width: 550px;
	height: 0px;
	background-color: #FFFFFF;
	padding: 8px;
}
#logo {
	position: relative;
	width: 300px;
	height: 200px;
	background: url(assets/images/logo_small.jpg) no-repeat;
}
</style>
</head>

<body>
<div id="demo">
	<div id="logo"></div>
</div>

<!-- TweenMax includes TweenLite, TimelineLite, TimelineMax, EasePack,  RoundPropsPlugin and CSSPlugin -->
<script type="text/javascript" src="assets/js/greensock/TweenMax.min.js"></script>

<script>
//we'll use a window.onload for simplicity, but typically it is best to use either jQuery's $(document).ready() or $(window).load() or cross-browser event listeners so that you're not limited to one.
window.onload = function() {
	var logo = document.getElementById("logo");
	TweenMax.to(logo, 1, {left:"300px", repeat:3, yoyo:true});
	
	//try these alternate animations
	//TweenMax.to(logo, 1, {css:{left:"300px"}, repeat:3});
	//TweenMax.to(logo, 1, {css:{left:"300px"}, repeat:3, yoyo:true, repeatDelay:.5});
	//TweenMax.to(logo, 1, {css:{left:"300px"}, repeat:-1, yoyo:true});	
}
</script>

</body>
</html>



<!-- <nav class="loginLinks"> -->
<a href="admin/login.php" class="loginBtn btn" id="loginHeaderBtn">Login</a>
<a href="admin/user_signup.php" class="loginBtn btn" id="signUpHeaderBtn">Sign Up</a>
<!-- </nav> -->


<header>
     <div class="headerImg">
          <img src="http://localhost/capstone/assets/images/heartsWeb.jpg" alt="string of paper hearts" class="heroImg">
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

          <form action="advsearch/index.php" method="post" id="advSearchByItems" class="advSearch">
            <input type="hidden" name="action" value="byItems">
            <label for="items">Search by Items Accepted by Charity</label>
               <select name="byItems">
                  <option> Choose ... </option>
                  <?php foreach ($itemCategories as $cat) : ?>
                      <option value="<?php echo $cat['itemCategory_ID'];?>"><?php echo $cat['category_name']; ?></option>
                    <?php endforeach; ?>
               </select>
            <input type="submit" value="Search" class="ctaBtn btn">
          </form>

     </section>

</section>
</main>

<script type="text/javascript" src='http://localhost/capstone/assets/js/landing.js'></script>
<?php include('view/footer.php');



