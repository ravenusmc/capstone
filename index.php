<?php include('view/header.php'); ?>
<a href='admin/login.php'>User Login</a>
<a href='admin/user_signup.php'>User Sign Up</a>



<header>
<img src="#" alt="" class="">
<h1 class="">Landing Page</h1>
</header>
<main>
<section class="" id="problem">
     <h2 class="homePageHeading">Problem</h2>
     <p>This is where we'll list out the problem.</p>
</section>

<section class="" id="solution">
     <h2 class="homePageHeading">How we solve it</h2>
     <p>This is where we'll list out how we solve the problem.</p>
</section>

<h3 class="ctaHeading">Interested in donating?</h3>
<a href="admin/user_signup.php" class="ctaBtn">Sign up!</a>

<section class="" id="searchCharities"> 
     <h2 class="homePageHeading">See charities in my area</h2>
     <form action="charity/index.php" method="post" class="">
          <input type="hidden" name="action" value="see_charity_by_zip">
          <input type="text" name='zip' placeholder="Enter your zip code" class="" id="enterAddress">
          <input type="submit" value="Go!">
     </form>
     <p><a href="">Advanced Search</a></p>
</section>
</main>

<?php include('view/footer.php');



