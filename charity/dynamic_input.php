<?php  
  if (!isset($_SESSION)) {
    session_start();
  }
  
  //This variable will be a flag to verify if the user is currently in a session
  //or just browsing. 
  $name = $_SESSION["username"];
  $user_id = $_SESSION["user_id"];


  $dsn = 'mysql:host=localhost;dbname=Capstone';
  $username = 'root';
  //$password = 'root';
  $password = 'Taa;2tosbt';
  $db = new PDO($dsn, $username, $password);


  $number = count($_POST["name"]);  
  $charity_id = $_POST["charity_id"];
  echo $charity_id;
  
  date_default_timezone_set('US/Eastern');
  $today = date("Y-m-d G:i:s");

 if( $number > 0)  
 {  
      for($i=0; $i < $number; $i++)  
      {  
           if(trim($_POST["name"][$i] != ''))  
           {  
              $query = "INSERT INTO donations 
                        (user_id, items_list, charity_id, created)
                        VALUES 
                        (:user_id, :items_list, :charity_id, :created)";
              $statement = $db->prepare($query);
              $statement->bindValue(':user_id', $user_id);
              $statement->bindValue(':items_list', $_POST["name"][$i]);
              $statement->bindValue(':charity_id', $charity_id);
              $statement->bindValue(':created', $today);
              $statement->execute();
              $statement->closeCursor();

           }  
      }  
      //echo "Data Inserted";  
      // needs to redirect to '../donations/index.php and change the donate_page_form.php file to remove the alert function.
      include '../donations/summary.php';
 }  
 else  
 {  
      echo "Please Enter Name";  
 }  

 ?> 