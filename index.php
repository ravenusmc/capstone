<?php 
include('view/header.php'); ?>

<aside class="loginLinks">
<a href='admin/login.php' class="loginBtn btn ">User Login</a>
<a href='admin/user_signup.php' class="loginBtn btn">User Sign Up</a>
</aside>


<header>
     <div class="heroImg">
          <img src="assets/images/heartsWeb.jpg" alt="string of paper hearts" class="headerImg">
          <p class="headerText">We are here to help</p>
     </div>
     <h1 class="homePageTitle">Welcome to Charity Connection</h1>
</header>

<main class="pageMain">

<section class="homePageSection" id="problem">
     <h2 class="homePageHeading">What's the problem?</h2>
     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed luctus ex ac luctus auctor. Ut sed orci pharetra, cursus enim eu, imperdiet tortor. Pellentesque ante turpis, condimentum eget augue nec, viverra suscipit neque. Nam id odio sed risus consectetur tincidunt. Maecenas ligula nulla, iaculis sed tempus eu, congue facilisis nulla. Vestibulum blandit finibus volutpat. In mattis, ipsum quis hendrerit mollis, sapien velit egestas mi, ac tincidunt odio est sed enim. Donec rhoncus, urna at elementum vehicula, lorem nulla sagittis ex, non ullamcorper leo nunc faucibus justo.</p>
</section>

<section class="homePageSection" id="solution">
     <h2 class="homePageHeading">How we solve it</h2>
     <p>Nullam rhoncus nunc vitae dictum eleifend. Vestibulum faucibus lacus eget malesuada semper. Vivamus lacinia auctor enim vitae vestibulum. Duis cursus leo dictum, consequat nibh rutrum, bibendum sapien. Integer et euismod orci, vel interdum est. Integer in diam felis. Nullam eu scelerisque eros. Cras imperdiet est vel metus maximus, eu accumsan diam efficitur. Integer sed mi facilisis, blandit nulla nec, porttitor mi. Morbi dignissim eleifend quam, at euismod neque tempus ac. Proin cursus rhoncus sem porta congue. Nulla congue ultricies bibendum. Proin turpis nunc, ultricies quis malesuada eget, feugiat eu neque. Quisque mollis, lorem vel viverra lacinia, neque nisi pulvinar libero, nec porta sem magna eget nisl.</p>
</section>

<section class="ctaSection" id="ctaSignUp">
     <h3 class="ctaHeading">Interested in donating?</h3>
     <a href="admin/user_signup.php" class="ctaBtn">Sign up!</a>
</section>

<section class="ctaSection" id="ctaSearch"> 
     <h3 class="ctaHeading">See charities in my area</h3>
     <form action="charity/index.php" method="post" class="">
          <input type="hidden" name="action" value="see_charity_by_zip">
          <input type="text" name='zip' placeholder="Enter your zip code" class="" id="enterAddress">
          <input type="submit" value="Go!">
     </form>
     <p class="advSearch"><a href="">Advanced Search</a></p>
     <section class="advSearchHidden">
          <form action="" method="post" class="advSearchByType">
               <select name="byType">
                     <option value=""></option>
                     <option value=""></option>
                     <option value=""></option>
                     <option value=""></option>
               </select>
          </form>

          <form action="" method="post" class="">
               <select name="">
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
                    <option value=""></option>
               </select>
          </form>

     </section>

</section>
</main>

<?php include('view/footer.php');



