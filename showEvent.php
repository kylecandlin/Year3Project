<?php
  include 'Includes/connect.php';
  include 'Includes/sessionStart.php';
  include 'Includes/eventList.php';
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
  <link rel="stylesheet" href="CSS/index.css?version=9" type="text/css">
  <link rel="stylesheet" href="CSS/login.css" type="text/css" />
  <link rel="stylesheet" href="CSS/event.css" type="text/css" />
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script
  src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"
  integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30="
  crossorigin="anonymous"></script>
  <script src="JavaScript/index.js"></script>
  <script src="JavaScript/event.js"></script>
</head>
<body>
  <section class="container">
    <section class="top-container">
      <?php include 'Includes/navigationPanel.php'; ?>
    </section>
    <section class="content">
      <section id="show-event-container">
        <?php
          $event = new eventList($pdo);
          $event->outputSingle($_SESSION['eventID']);
        ?>
        <p id="login-request">
          Please <a href="login.php">log in</a> to register for this event.
        </p>
        <input id="register-attendance" class="submit-button input-button" type="submit" value='Register Attendance' />
        <section class="register-event">
          <ul>
            <li id="cancel" class="double-button submit-button input-button">Cancel</li>
            <li id="next" class="double-button submit-button input-button">Next</li>
            <li id="finish" class="double-button submit-button input-button">Finish</li>
          </ul>
          <section id="step-one">
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
          <section id="step-two">
            <p>
              By ticking this box, you confirm that you have read the Terms and Conditions
              and you understand all payments should be presented in full at the door
              upon arrival of the event. Under no circumstances will this website accept card payments.
            </br><input id="TandC" type="checkbox" />
            </p>
            <p id="error-report"></p>
          </section>
        </section>
      </section>
    </section>
  <?php include 'Includes/footer.php'; ?>
  </section>
</body>
</html>
