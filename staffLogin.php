<?php
  include 'Includes/connect.php';
  include 'Includes/sessionStart.php';
  include 'Includes/StaffFunctions.php';

  if(isset($_POST['submitButton'])){
    $user = new StaffFunctions($pdo);
    $user->SignIn($_POST['username'], $_POST['password']);
  }
?>
<html lang="en">
<head>
  <script>
    var userID = '<?php echo $_SESSION['username']; ?>';
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="CSS/index.css?version=9" type="text/css">
  <link rel="stylesheet" href="CSS/login.css?version=4" type="text/css">
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="JavaScript/index.js"></script>
</head>
<body>
  <section class="top-container">
    <?php include 'Includes/navigationPanel.php'; ?>
  </section>
  <section class="container">
    <section class="content">
      <form action="" method="post" id="loginForm">
        <h1> Staff Login </h1>
        <input name="username" class="input-button" type="text" placeholder="Username" />
        <input name="password" class="input-button" type="text" placeholder="Password" />
        <input id="submit-button" name="submitButton" class="input-button" type="submit" value="Log In"/>
        <p><a href="staffRegister.php"> Create staff account here. </a></p>
      </form>
    </section>
    <?php include 'Includes/footer.php'; ?>
  </section>
</body>
</html>
