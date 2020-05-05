<?php
  // includes required pages

  include 'Includes/connect.php';
  include 'Includes/sessionStart.php';
  include 'Includes/eventList.php';
?>
<html lang="en">
<head>
  <!-- Assigns a JavaScript variable to a $_SESSION value -->
  <script type="text/javascript">
    var userID = '<?php echo $userID; ?>';
    var staffID = '<?php echo $staffID; ?>';
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <!-- CSS links -->
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="CSS/index.css?version=9" type="text/css">
  <link rel="stylesheet" href="CSS/login.css" type="text/css" />
  <link rel="stylesheet" href="CSS/event.css" type="text/css" />
  <!-- JavaScript links -->
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="JavaScript/index.js"></script>
  <script src="JavaScript/event.js"></script>
</head>
<body>
  <section class="top-container">
    <!-- navigation bar and menu -->
    <?php include 'Includes/navigationPanel.php'; ?>
  </section>
  <section class="container">
    <section class="content">
      <!-- form that outputs full list of events -->
      <form method="post" action="">
        <section id="event-grid">
          <?php
            $data = new eventList($pdo);
            $data->outputAll();
          ?>
        </section>
        <!-- button to add new event -->
        <a id="event-add" name='view-event' class="submit-button input-button" href="addEvent.php">Add new Event</a>
      </form>
    </section>
    <!-- footer -->
    <?php include 'Includes/footer.php'; ?>
  </section>
</body>
</html>
