<?php
  // includes required pages

  include 'Includes/connect.php';
  include 'Includes/sessionStart.php';
  include 'Includes/UserFunctions.php';

  // on button click call user login function
  if(isset($_POST['submitButton'])){
    $user = new UserFunctions($pdo);
    $user->SignIn($_POST['username'], $_POST['password']);
  }
?>
<html lang="en">
<head>
  <!-- Assigns a JavaScript variable to a $_SESSION value -->
  <script type="text/javascript">
    var userID = '<?php echo $userID ?>';
    var staffID = "<?php echo $staffID; ?>";
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <!-- CSS links -->
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="CSS/index.css?version=9" type="text/css">
  <link rel="stylesheet" href="CSS/login.css?version=3" type="text/css">
  <!-- JavaScript links -->
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="JavaScript/index.js"></script>
</head>
<body>
  <section class="top-container">
    <!-- navigation bar and menu -->
    <?php include 'Includes/navigationPanel.php'; ?>
  </section>
  <section class="container">
    <section class="content">
      <!-- login form -->
      <form action="" method="post" id="loginForm">
        <h1> Login </h1>
        <input id="username" name="username" class="input-button" type="text" placeholder="Username" />
        <input id="password" name="password" class="input-button" type="text" placeholder="Password" />
        <input name="submitButton" class="submit-button input-button" type="submit" value="Login"/>
        <p> No account? <a href="register.php"> Create one here. </a></p>
      </form>
    </section>
    <!-- page footer -->
    <?php include 'Includes/footer.php'; ?>
  </section>
</body>
</html>
