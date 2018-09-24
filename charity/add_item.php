<?php
  session_start();
  
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $id = $_SESSION["user_id"];
  
?>
<?php include '../view/header.php'; ?>
<link rel="stylesheet" type="text/css" href="../assets/css/add_item.css">

  <h1>Add Item</h1>

  <!-- Start of form for adding item -->
  <form action="index.php" method="post">

    <input type="hidden" name="action" value="add_item" />

    <input type='hidden' name='user_id' value='<?php echo $id ?>' />

    <input placeholder='Item Name' type='text' name='item_name' required>&nbsp;
    <label>Item Type:</label>
    <select name='category_type' id='item_category'>
      <?php foreach ($item_categories as $item_category): ?>
        <option value='<?php echo $item_category['itemCategory_ID']; ?>'><?php echo $item_category['category_name']; ?></option>
      <?php endforeach; ?> 
    </select>

    <input onclick='showCharities(); return false;' type="submit" value="See Charity Types" />

    <!-- Start of AJAX charity type test -->
    <div id='charity_type_selection'>
      <div id="txtHint">
        <label>Charity Type</label>
      </div>
    </div>

    <!-- End of AJAX charity type test -->

    <input type="submit" value="Add Item" />

  </form>
  <!-- End of form to add item -->

  <form action='index.php' method='post'>

    <input type="hidden" name="action" value="see_charities" />
    <input type='' name='user_id' value='<?php echo $id ?>' />
    <input type="submit" value="See Charities" />

  </form>

  <script type="text/javascript" src='../assets/js/ajax.js'></script>