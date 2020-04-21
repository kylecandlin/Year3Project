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
      <form method="post" action="">
        <section id="event-grid">
          <?php
            $data = new eventList($pdo);
            $data->outputAll();
          ?>
        </section>
        <a name='view-event' class="submit-button input-button" href="addEvent.php">Add new Event</a>
      </form>
    </section>
    <?php include 'Includes/footer.php'; ?>
    </section>
</body>
</html>
