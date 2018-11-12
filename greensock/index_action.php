<?php 
require('model/database.php');
require('model/charities.php');
require('model/items.php');
require_once('assets/utility/util.php');
include('view/header.php'); 

$charityTypes = get_charity_type();
$itemCategories = get_all_item_categories();
 ?>


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

		  
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<link href="assets/js/jquery/css/ui-lightness/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css">
<style>

<!--
body {
	background-color: #FFFFFF;
	
	
	color:#fff;


}

#demo {
	width: 500px;
	height: 0px;
	padding: 8px;
}
-->
<!--
#demoBackground {
	position: relative;
	background-color: #FFFFFF;
	overflow: hidden;
	width: 500px;
	height: 155px;
	visibility:hidden;
}
-->

#logo {
	position: absolute;  
	background: url(assets/images/logo_small.jpg) no-repeat;
	height: 200px;
	width: 300px;
	top: 6px;  
}


<!--.sliderHolder{
	margin-top:16px;
	float:left;
	width:280px;
	
}
.sliderHolder p{
	margin:0px;
	font-size:14px;
}
.slider {
	width: 270px;
	margin: 4px 0px 8px 6px;	
}
-->


#txtContainer {
	position: absolute;
	left: 55px;
	top: 14px;
}
.txt {
	font: 36px monospace;
	position: absolute;
	color: #afafaf;
	font-weight: bold;
	left: 0px;
	top: 0;
}
</style>
</head>

<body>
<div id="demo">
  <div id="demoBackground">
    <div id="logo"></div>
    <div id="txtContainer"></div>
  </div>
</div>


<!--
<div class="sliderHolder">
  <p class="output">progress(): <span id="progressValue"></span><span  style="float:right;">time(): <span id="timeValue"></span></span></p>
  <div id="progressSlider" class="slider"></div>
</div>

<div class="sliderHolder" style="margin-left:80px;">
  <p class="output">totalProgress(): <span id="totalProgressValue"></span><span style="float:right;">totalTime(): <span id="totalTimeValue"></span></span></p>
  <div id="totalProgressSlider" class="slider"></div>
</div>

<input type="button" id="restartBtn" style="margin:30px;" value="restart()">	
-->


<script type="text/javascript" src="assets/js/greensock/TweenMax.min.js"></script>
<!-- scripts for jQuery UI slider component -->
<script src="assets/js/jquery/jquery-1.8.2.js"></script>
<script src="assets/js/jquery/jquery-ui-1.9.1.custom.min.js"></script>
<!-- script for making jQuery UI components respond to touch input -->
<script src="assets/js/jquery/jquery.ui.touch-punch.js"></script>

<script>

$(window).load(function() {
	var logo = $("#logo"),
		progressValue = $("#progressValue"),
		totalProgressValue = $("#totalProgressValue"),
		timeValue = $("#timeValue"),
		totalTimeValue = $("#totalTimeValue"),
	 	restartBtn = $("#restartBtn"),
		txtContainer = $("#txtContainer"),
		tl, 
		progressSlider, 
		totalProgressSlider, 
		txt;
	
		/* config sliders */
	
		progressSlider = $("#progressSlider").slider({
            range: false,
            min: 0,
            max: 100,
			step:.1,
            slide: function ( event, ui ) {
				tl.pause();
                tl.progress( ui.value/100 );
            }
        });
		
		totalProgressSlider = $("#totalProgressSlider").slider({
            range: false,
            min: 0,
            max: 100,
			step:.1,
            slide: function ( event, ui ) {
				tl.pause();
                tl.totalProgress( ui.value/100 );
            }
        });		
		
	
	 
	 /* build DOM elements*/
	 
	function splitText(phrase) {
		var prevLetter, sentence,
			sentence = phrase.split("");
		$.each(sentence, function(index, val) {
			if(val === " "){
				val = "&nbsp;";
			}
			var letter = $("<div/>", {
						id : "txt" + index
			}).addClass('txt').html(val).appendTo(txtContainer);
	
			if(prevLetter) {
				$(letter).css("left", ($(prevLetter).position().left + $(letter).width()) + "px");
			};
			prevLetter = letter;
		});
		txt = $(".txt");
	}
	  
	function buildTimeline() {
		
		//note this timeline uses 3D transforms which will only work in recent versions of Safari, Chrome, and FireFox. IE10 will support 3D transforms as well. All other browsers simply will not show those properties being tweened. 
		
		TweenLite.set(txtContainer, {css:{perspective:500}});
		
		tl = new TimelineMax({onUpdate:updateUI, repeat:2, repeatDelay:1, yoyo:true});
		tl.from(logo, 0.5, {left:'-=300px', ease:Back.easeOut});	
		tl.staggerFrom(txt, 0.4, {alpha:0}, 0.06, "textEffect");
		tl.staggerFrom(txt, 0.8, {rotationY:"-270deg", top:80, transformOrigin: "50% 50% -80", ease:Back.easeOut}, 0.06, "textEffect");
		tl.staggerTo(txt, 0.6, {rotationX:"360deg", color:"#90e500", transformOrigin:"50% 50% 10"}, 0.02);	
	} 
	 
	/* callbacks */
	
	function updateUI() {
		//change slider value
		progressSlider.slider("value", tl.progress() *100);
		totalProgressSlider.slider("value", tl.totalProgress() *100);
		
		//update display of values
		progressValue.html(tl.progress().toFixed(2));
		totalProgressValue.html(tl.totalProgress().toFixed(2));
		timeValue.html(tl.time().toFixed(2));
		totalTimeValue.html(tl.totalTime().toFixed(2));
	} 				  
		  	
	restartBtn.click(function() {
		//Start playing from a progress of 0.
		tl.restart();
	});
	
	function init() {
		splitText("Charity Connection");
		buildTimeline();
		//show the demoBackground div after DOM is ready and all images loaded
		TweenLite.set($("#demoBackground"), {visibility:"visible"});
	}
  	 
	init();
});

</script>
</body>
</html>	 		  
		  
		  
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



