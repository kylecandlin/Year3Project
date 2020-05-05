<?php include 'Includes/sessionStart.php'; ?>
<html lang="en">
<head>
  <!-- Assigns a JavaScript variable to a $_SESSION value -->
  <script>
    var userID = '<?php echo $userID; ?>';
    var staffID = '<?php echo $staffID; ?>';
  </script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <!-- CSS links -->
  <link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="CSS/index.css?version=10" type="text/css">
  <link rel="stylesheet" href="CSS/home.css" type="text/css">
  <link rel="stylesheet" href="CSS/infoBox.css" type="text/css">
  <!-- JavaScript links -->
  <script
    src="https://code.jquery.com/jquery-3.4.1.js"
    integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
    crossorigin="anonymous">
  </script>
  <script src="JavaScript/index.js"></script>
  <script src="JavaScript/home.js"></script>
</head>
<body>
  <section class="container">
    <!-- first grid section -->
    <section class="top-container">
      <!-- navigation bar and menu -->
      <section class="nav-bar">
        <h1 id="pub-title-nav"> The Bridge Inn </h1>
        <ul id="nav-button">
          <li id="nav-login"><a href="login.php?version=4">Login</a></li>
        </ul>
      </section>
      <section class="header-content">
        <section>
          <h1 id="pub-title-header"> The Bridge Inn </h1>
          <section id="event-btn">
            <a href="event.php">View Events</a>
          </section>
        </section>
      </section>
    </section>
    <!-- main content section -->
    <section class="content">
      <!-- used to create custom border -->
      <section class="box-border">
      </section>
      <!-- main page header -->
      <section class="info-header-container">
        <h1> Main Header </h1>
        <p> This is a subsection to the main header </p>
      </section>
      <!-- subsections -->
      <section class="info-container">
        <img src="CSS/Images/pub.jpg" class="info-container-image" />
        <h1 class="info-container-header"> This is a Test </h1>
        <p class="info-container-text"> This is to help me style this box. </p>
      </section>
      <section class="info-container">
        <img src="CSS/Images/pub.jpg" id="image1" class="info-container-image" />
        <h1 class="info-container-header"> This is a Test </h1>
        <p class="info-container-text"> This is to help me style this box. </p>
      </section>
      <section class="info-container">
        <img src="CSS/Images/pub.jpg" class="info-container-image" />
        <h1 class="info-container-header"> This is a Test </h1>
        <p class="info-container-text"> This is to help me style this box. </p>
      </section>
    </section>
    <!-- page footer -->
    <?php include 'Includes/footer.php'; ?>
  </section>
</body>
</html>
