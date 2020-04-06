<?php
  include 'Includes/connect.php';
  include 'Includes/StaffFunctions.php';
  session_start();

  if(isset($_POST['submitButton'])){
    $User = new StaffFunctions($pdo);
    $User->CreateStaff($_POST['forename'], $_POST['surname'], $_POST['password'], $_POST['DOB']);
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
      <form action="" method="post" id="registerForm">
        <h1> Register </h1>
        <input name="forename" class="input-button" type="text" placeholder="Forename" />
        <input name="surname" class="input-button" type="text" placeholder="Surname" />
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