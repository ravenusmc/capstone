<?php
    $dsn = 'mysql:host=localhost;dbname=Capstone';
    $username = 'root';
    //$password = 'root';
    $password = 'Taa;2tosbt';
    
    try {
        $db = new PDO($dsn, $username, $password);
        //echo 'connected';
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // echo 'failed';
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>