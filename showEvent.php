<?php
  include 'Includes/connect.php';
  include 'Includes/sessionStart.php';
  include 'Includes/eventList.php';
?>
<html lang="en">
<head>
  <script>
    var userID = '<?php echo $_SESSION['username']; ?>';
    var staffID = '<?php echo $_SESSION['username']; ?>';
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="CSS/index.css?version=9" type="text/css">
  <link rel="stylesheet" href="CSS/login.css" type="text/css" />
  <link rel="stylesheet" href="CSS/event.css" type="text/css" />
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="JavaScript/index.js"></script>
  <script src="JavaScript/event.js"></script>
</head>
<body>
  <section class="top-container">
    <?php include 'Includes/navigationPanel.php'; ?>
  </section>
  <section class="container">
    <section class="content">
      <section id="show-event-container">
        <?php
          $event = new eventList($pdo);
          $event->outputSingle($_SESSION['eventID']);
        ?>
        <input id="register-attendance" class="submit-button input-button" type="submit" value='Register Attendance' />
        <section class="dropdown">
          <section class="select">
            <span>Number of People: </span>
          </section>
          <ul class="dropdown-menu">
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>5</li>
            <li>6</li>
            <li>7</li>
            <li>8</li>
            <li>9</li>
          </ul>
        </section>
      </section>
    </section>
  <?php include 'Includes/footer.php'; ?>
  </section>
</body>
</html>
