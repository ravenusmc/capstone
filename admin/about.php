<?php 

if (!isset($_SESSION)) {
     session_start();
   }

//$name = $_SESSION["username"];
//$id = $_SESSION["user_id"];

 ?>

<?php  require_once('../assets/utility/util.php');
include '../view/header.php'; 
?>

  


<main class="page">
<h2 class='pageHeading'>About Charity Connection</h2>
<section class='aboutContent'>
<p><span class="companyName">Charity Connection</span> was birthed as a Capstone Project for our Fall 2018 Web Systems Project course and a mutual desire to simplify donating gently used items to nearby reputable non-profit charities. Our group consists of four students pursuing Web Design and Development Associate Degrees from Gwinnett Technical College. The non-profit charities used in our project are for educational purposes only and no harm or ill-intent is intended.</p>
<img class="aboutImg" src="<?php echo $fullPath; ?>assets/images/youCanHelp.jpg" alt="You can help image">
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda, provident harum pariatur deleniti minima quisquam dolorem aut eaque ex dignissimos quod ea et ullam modi unde eveniet odio in esse.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Neque, deserunt suscipit? Exercitationem voluptates animi praesentium, architecto porro reprehenderit ducimus mollitia quisquam hic quidem consequatur, atque dolorem, veritatis laboriosam cumque maiores?</p>
</section> 



</main>

<?php include '../view/footer.php'; ?>