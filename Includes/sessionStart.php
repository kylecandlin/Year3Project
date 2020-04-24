<?php
  if(!isset($_SESSION)) {
    session_start();
  }

  if(isset($_SESSION['username'])) {
    $userID = $_SESSION['username'];
  }
  else {
    $userID = '';
  }

  if(isset($_SESSION['sUsername'])) {
    $staffID = $_SESSION['sUsername'];
  }
  else {
    $staffID = '';
  }
?>
