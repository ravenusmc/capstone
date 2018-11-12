<?php 
 
?>




<style>

body{
	background-color:#FFFFFF;
}
#demo {
	width: 1330px;
	height: 0px;


  /*background-color: #FFFFFF; */


	padding: 8px;
}

#logo {
	position: relative;
	width: 30px;
	height: 55px;
	background: url(assets/images/logo_small.jpg) no-repeat;
}
</style>

<div id="demo">
	<div id="logo"></div>
</div>
<!--- The following scripts are necessary to do TweenLite tweens on CSS properties -->
<script type="text/javascript" src="assets/js/greensock/plugins/CSSPlugin.min.js"></script>
<script type="text/javascript" src="assets/js/greensock/TweenLite.min.js"></script>


<script>
//we'll use a window.onload for simplicity, but typically it is best to use either jQuery's $(document).ready() or $(window).load() or cross-browser event listeners so that you're not limited to one.
window.onload = function(){
	var logo = document.getElementById("logo");
	TweenLite.to(logo, 4, {left:"1300px"});
}
</script>




