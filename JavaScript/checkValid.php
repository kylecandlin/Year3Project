<?php
  $password = $_POST['username'];

  if (strlen($password) > 8) {
    echo 'length';
  }

  if (preg_match('/[0-9]/', $password)) {
    echo 'number';
  }

  if (preg_match('/[A-Z]/', $password)) {
    echo 'capital';
  }

  echo 0;
?>
