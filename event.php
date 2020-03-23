<?php
  include 'Includes/connect.php';
  include 'Includes/navigationPanelHome.php';
  include 'Includes/showData.php';
?>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
  <link rel="stylesheet" href="CSS/index.css?version=10" type="text/css">
  <link rel="stylesheet" href="CSS/home.css" type="text/css">
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="JavaScript/index.js"></script>
</head>
<body>
  <section class="container">
    <section class="content">
      <?php
        $data = new showData($pdo);
        $data->output();
      ?>
      </section>
    </section>
    <?php include 'Includes/footer.php'; ?>
  </section>
</body>
</html>
