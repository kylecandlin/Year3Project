<?php
  include 'Includes/connect.php';
  include 'Includes/sessionStart.php';
  include 'Includes/accountDetails.php';

  $user = new AccountDetails($pdo);

  if(isset($_POST['logout-btn'])){
    $user->accountLogOut();
  }
?>
<html lang="en">
<head>
  <script type="text/javascript">
    var userID = '<?php echo $userID ?>';
    var staffID = "<?php echo $staffID; ?>";
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="CSS/index.css?version=9" type="text/css" />
  <link rel="stylesheet" href="CSS/infoBox.css" type="text/css" />
  <link rel="stylesheet" href="CSS/account.css" type="text/css" />
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="JavaScript/index.js"></script>
  <script src="JavaScript/account.js"></script>
</head>
<body>
  <section class="top-container">
    <?php include 'Includes/navigationPanel.php'; ?>
  </section>
  <section class="container">
    <section class="content">
      <section>
        <form action="" method="post" class="account-menu">
          <ul>
            <li id="account-btn">Account</li>
            <li id="event-btn">Events</li>
            <input name="logout-btn" type="submit" value="Logout" />
          </ul>
        </form>
        <section id="account-info" class="account-container">
          <?php
            $user->showAccount();
          ?>
        </section>
        <section id="event-info" class="account-container">
          <?php
            $user->showEvent();
          ?>
        </section>
      </section>
    </section>
    <?php include 'Includes/footer.php'; ?>
  </section>
</body>
</html>
