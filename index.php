<?php 
include('view/header.php'); ?>

<a href='admin/login.php'>User Login</a>
<a href='admin/user_signup.php'>User Sign Up</a>



<header>
<img src="assets/images/heartsWeb.jpg" alt="string of paper hearts" class="headerImg">
<h1 class="">Welcome to Charity Connection</h1>
</header>

<main class="pageMain">

<section class="homePageSection" id="problem">
     <h2 class="homePageHeading">What's the problem?</h2>
     <p>This is where we'll list out the problem.</p>
</section>

<section class="homePageSection" id="solution">
     <h2 class="homePageHeading">How we solve it</h2>
     <p>This is where we'll list out how we solve the problem.</p>
</section>

<section class="ctaSection">
     <h3 class="ctaHeading">Interested in donating?</h3>
     <a href="admin/user_signup.php" class="ctaBtn">Sign up!</a>
</section>

<section class="ctaSection" id="searchCharities"> 
     <h3 class="ctaHeading">See charities in my area</h3>
     <form action="charity/index.php" method="post" class="">
          <input type="hidden" name="action" value="see_charity_by_zip">
          <input type="text" name='zip' placeholder="Enter your zip code" class="" id="enterAddress">
          <input type="submit" value="Go!">
     </form>
     <p class="advSearch"><a href="">Advanced Search</a></p>
     <section class="advSearchHidden">
          <form action="" method="" class="advSearchByType">
               <select name="byType">
                     
               </select>
          </form>

     </section>

</section>
</main>

<?php include('view/footer.php');



