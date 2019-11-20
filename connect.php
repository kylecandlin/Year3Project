<?php
  // Connection variables
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $dbms = 'dms';

  // Create connection
  try {
    $conn = new PDO("mysqli:host=$host;dbname=$dbms", $user, $pass);

    //Set error mode to exceptional
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful";
  }

  catch(PDOException $e){
    echo "Connection error: " . $e->getMessage();
  }
?>
