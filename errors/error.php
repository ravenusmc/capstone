<?php 
include('../view/header.php'); ?>
<div id="main">
    <h1 class="top">Error</h1>
    <p class="first_paragraph"><?php echo $error; ?></p>
    <a href="<?php echo $appPath ?>">Home</a>
</div>
<?php include('../view/footer.php'); ?>