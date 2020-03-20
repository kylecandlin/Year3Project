<?php
  // Connection variables
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $dbms = 'pub';

  // Create connection
  try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbms", $user, $pass);

    //Set error mode to exceptional
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  catch(PDOException $e){

  }
?>
