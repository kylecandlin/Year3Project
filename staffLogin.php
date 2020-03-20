<?php
  require 'Includes/connect.php';
  require 'Includes/navigationPanel.php';
  require 'Includes/UserFunctions.php';

  if(isset($_POST['submitButton'])){
    $user = new StaffFunctions($pdo);
    $user->SignIn($_POST['surname'], $_POST['password']);
  }
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="CSS/index.css?version=9" type="text/css">
  <link rel="stylesheet" href="CSS/login.css?version=3" type="text/css">
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="JavaScript/index.js"></script>
</head>
<body>
  <section class="container">
    <section class="top-container">
      <section class="nav-bar">
        <button id="hamburger" class="menu-icon">&#9776;</button>
        <button id="cross" class="menu-icon">&#735;</button>
        <h1 id="pub-title-nav"> Title Goes Here </h1>
        <ul id="nav-button">
          <li><a href="login.php?version=2">Log In</a></li>
          <li><a href="page1.html">Page1</a></li>
          <li><a href="index.html">Home</a></li>
        </ul>
        <ul id="nav-menu">
          <li><a href="index.html">Home</a></li>
          <li><a href="page1.html">Page1</a></li>
          <li><a href="login.php">Log In</a></li>
        </ul>
      </section>
    </section>
    <section class="content">
      <form action="" method="post" id="loginForm">
        <h1> Staff Login </h1>
        <input name="surname" class="input-button" type="text" placeholder="Surname" />
        <input name="password" class="input-button" type="text" placeholder="Password" />
        <input id="submit-button" name="submitButton" class="input-button" type="submit" value="Log In"/>
        <p><a href="register.php"> Create staff account here. </a></p>
      </form>
    </section>
    <?php include 'Includes/footer.php'; ?>
  </section>
</body>
</html>
