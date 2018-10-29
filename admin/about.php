<?php 

session_start();

$name = $_SESSION["username"];
$id = $_SESSION["user_id"];

 ?>

<?php  require_once('../assets/utility/util.php');
include '../view/header.php'; 
?>

  


<main class="page">
<h2 class='pageHeading'>About Charity Connection</h2>
<section class='aboutContent'>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque, alias itaque omnis voluptatem iste, quos ipsum quas nesciunt cupiditate cum esse excepturi accusamus! Eius blanditiis laborum, dolor voluptate optio quia!</p>
<img class="aboutImg" src="<?php echo $fullPath; ?>assets/images/youCanHelp.jpg" alt="You can help image">
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, provident harum pariatur deleniti minima quisquam dolorem aut eaque ex dignissimos quod ea et ullam modi unde eveniet odio in esse.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, deserunt suscipit? Exercitationem voluptates animi praesentium, architecto porro reprehenderit ducimus mollitia quisquam hic quidem consequatur, atque dolorem, veritatis laboriosam cumque maiores?</p>
</section> 



</main>

<?php include '../view/footer.php'; ?>