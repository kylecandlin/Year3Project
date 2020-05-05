<?php
  // includes required pages

  include 'Includes/connect.php';
  include 'Includes/sessionStart.php';
  include 'Includes/UserFunctions.php';

  // on click call user registration function
  if(isset($_POST['submitButton'])){
    $User = new UserFunctions($pdo);
    $User->CreateUser($_POST['username'], $_POST['password']);
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
  <link rel="stylesheet" href="CSS/login.css?version=4" type="text/css">
  <!-- JavaScript links -->
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="JavaScript/index.js"></script>
  <script src="JavaScript/validation.js"></script>
</head>
<body>
  <section class="top-container">
    <!-- navigation bar and menu -->
    <?php include 'Includes/navigationPanel.php'; ?>
  </section>
  <section class="container">
    <section class="content">
      <!-- registration form -->
      <form action="" method="post" id="registerForm">
        <h1> Register </h1>
        <input name="username" class="input-button" type="text" placeholder="Username" />
        <p id="usernameCheck"></p>
        <input id="password" name="password" class="input-button" type="text" placeholder="Password" />
        <p id="passwordCheck"></p>
        <input id="DOB" name="DOB" class="input-button" type="date" />
        <p id="dobCheck" class="validCheck"></p>
        <input name="submitButton" id="submit-button" class="submit-button input-button" type="submit" value="Create Account"/>
        <p> Already have an account? <a href="login.php"> Log in here. </a></p>
      </form>
    </section>
    <!-- page footer -->
    <?php include 'Includes/footer.php'; ?>
  </section>
</body>
</html>
