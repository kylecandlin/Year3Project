<?php
  // Includeing class file for use of functions
  include 'Includes/connect.php';
  include 'Includes/EventRegister.php';
  session_start();

  // Getting variables for use in SQL
  $quantity = $_POST['quantity'];
  $eventID = $_SESSION['eventID'];

  // Get userID
  if(isset($_SESSION['username'])) {
    $userID = $_SESSION['username'];
  }

  if(isset($_SESSION['sUsername'])) {
    $userID = $_SESSION['sUsername'];
  }

  // Instantiate class and call function
  $func = new EventRegister($pdo);
  $output = $func->checkExists($userID, $eventID, $quantity);

  echo $output;
?>
