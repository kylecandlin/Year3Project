<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="stylesheet" href="CSS/index.css?version=7" type="text/css">
  <link rel="stylesheet" href="CSS/login.css?version=3" type="text/css">
  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
  <script src="JavaScript/index.js"></script>
</head>
<body>
  <section class="container">
    <section class="top-container">
      <section class="nav-bar">
        <button id="hamburger" class="menu-icon">&#9776;</button>
        <button id="cross" class="menu-icon">&#735;</button>
        <h1 id="pub-title-nav"> Title Goes Here </h1>
        <ul id="nav-button">
          <li><a href="login.php">Log In</a></li>
          <li><a href="page1.html">Page1</a></li>
          <li><a href="index.html">Home</a></li>
        </ul>
        <ul id="nav-menu">
          <li><a href="index.html">Home</a></li>
          <li><a href="page1.html">Page1</a></li>
          <li><a href="login.php">Log In</a></li>
        </ul>
      </section>
    </section>
    <section class="content">
      <form id="loginForm" method="post">
        <h1> Login </h1>
        <input class="input-container-input" type="text" placeholder="Username" />
        <input class="input-container-input" type="text" placeholder="Password" />
      </form>
    </section>
    <section class="page-footer">
        <section id="footer-company-details">
          <h1> The Bridge Inn </h1>
          <p> est 1890 </p>
          <section id="footer-media-links">
            <p class="footer-media-icon"> img </p>
            <p class="footer-media-icon"> img </p>
            <p class="footer-media-icon"> img </p>
            <p class="footer-media-icon"> img </p>
          </section>
        </section>
        <section id="footer-contact-details">
          <section id="footer-company-location">
            <p class="footer-contact-icon"> img </p>
            <section class="footer-icon-text">
              <span> 8 Bridge Street </span>
              Stourport On Severn
            </section>
          </section>
          <section id="footer-company-phone">
            <p class="footer-contact-icon"> img </p>
            <section class="footer-icon-text">
              <p> 01299 123456 </p>
            </section>
          </section>
        </section>
        <section id="footer-company-about">
          <h1> About The Pub </h1>
          <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit,
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            Quis commodo odio aenean sed adipiscing diam donec. In cursus 0turpis
            massa tincidunt dui ut ornare lectus. Commodo elit at imperdiet dui. </p>
        </section>
    </section>
  </section>
</body>
</html>
