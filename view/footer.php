<?php  
?>

<footer>
<p>&copy; <?php echo date('Y'); ?> Elizabeth Bank, Michael Cuddy, Jane Lu, and Terry Wells</p>
<h6>Website created for Web Systems Project course at <a href="https://www.gwinnetttech.edu/">Gwinnett Technical College</a>, Lawrenceville, GA</h6>
</footer>


<!-- Greensock Animation scripts -->
<!--- The following scripts are necessary to do TweenLite tweens on CSS properties -->
<script type="text/javascript" src="<?php echo $fullPath; ?>greensock/assets/js/greensock/plugins/CSSPlugin.min.js"></script>
<script type="text/javascript" src="<?php echo $fullPath; ?>greensock/assets/js/greensock/TweenLite.min.js"></script>
<script>
//we'll use a window.onload for simplicity, but typically it is best to use either jQuery's $(document).ready() or $(window).load() or cross-browser event listeners so that you're not limited to one.
window.onload = function(){
	var logo = document.getElementById("logo");
	TweenLite.to(logo, 4, {left:"1250px"});
}
</script>


</body>
</html>