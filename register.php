<?php
  require 'Includes/connect.php';
  require 'Includes/navigationPanel.php';
  require 'Includes/UserFunctions.php';

  if(isset($_POST['submitButton'])){
    $User = new UserFunctions($pdo);
    $User->CreateUser($_POST['username'], $_POST['password']);
  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="stylesheet" href="CSS/index.css?version=9" type="text/css">
  <link rel="stylesheet" href="CSS/login.css?version=4" type="text/css">
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="JavaScript/index.js"></script>
</head>
<body>
  <section class="container">
    <section class="content">
      <form action="" method="post" id="registerForm">
        <h1> Register </h1>
        <input name="username" class="input-button" type="text" placeholder="Username" />
        <input name="password" class="input-button" type="text" placeholder="Password" />
        <input id="DOB" name="DOB" class="input-button" type="date" />
        <input id="submit-button" name="submitButton" class="input-button" type="submit" value="Create Account"/>
        <p> Already have an account? <a href="login.php"> Log in here. </a></p>
      </form>
    </section>
    <?php include 'Includes/footer.php'; ?>
  </section>
</body>
</html>
