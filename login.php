<?php
  require 'Includes/connect.php';
  include 'Includes/navigationPanel.php';
  include 'Includes/UserFunctions.php';

  if(isset($_POST['submitButton'])){
    $user = new UserFunctions($pdo);
    $user->SignIn($_POST['username'], $_POST['password']);
  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="CSS/index.css?version=9" type="text/css">
  <link rel="stylesheet" href="CSS/login.css?version=3" type="text/css">
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="JavaScript/index.js"></script>
  <script src="JavaScript/login.js"></script>
</head>
<body>
  <section class="container">
    <section class="content">
      <form action="" method="post" id="loginForm">
        <h1> Login </h1>
        <input id="username" name="username" class="input-button" type="text" placeholder="Username" />
        <input id="password" name="password" class="input-button" type="text" placeholder="Password" />
        <input id="submit-button" name="submitButton" class="input-button" type="submit" value="Log In"/>
        <p> No account? <a href="register.php"> Create one here. </a></p>
      </form>
    </section>
    <?php include 'Includes/footer.php'; ?>
  </section>
</body>
</html>
