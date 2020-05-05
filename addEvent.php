<?php
  // includes required pages

  include 'Includes/connect.php';
  include 'Includes/sessionStart.php';
  include 'Includes/eventList.php';

  // on click call add event function
  if(isset($_POST['submit-button'])) {
    $event = new eventList($pdo);
    $event->addEvent($_POST['name'], $_POST['date'], $_POST['desc'], $_SESSION['username']);
  }
?>
<html lang="en">
<head>
  <!-- Assigns a JavaScript variable to a $_SESSION value -->
  <script type="text/javascript">
    var userID = '<?php echo $userID ?>';
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
      <!-- add event form -->
      <form method="post" action="">
        <input name="name" class="input-button" maxlength="20" type="text" placeholder="Event name  (max: 20)" value="Event" />
        <input id="date" name="date" class="input-button" type="datetime-local" />
        <textarea name="desc" class="input-button" maxlength="1000" type="text" placeholder="Description  (max: 1000)">This is an event Description</textarea>
        <input name="submit-button" class="submit-button input-button" type="submit" value="Add Event" />
      </form>
    </section>
    <!-- page footer -->
  <?php include 'Includes/footer.php'; ?>
  </section>
</body>
</html>
