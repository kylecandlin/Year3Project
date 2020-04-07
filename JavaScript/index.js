$(document).ready(function(){

  /*** Naviation Bar Functions and Functionality ***/
  function closeNav(){
    $("#nav-menu").slideUp("slow");
    $("#cross").hide();
    $("#hamburger").show();
  }

  function openNav(){
    $("#nav-menu").slideDown("slow");
    $("#hamburger").hide();
    $("#cross").show();
  }

  $(window).resize(function(){
    closeNav();
  });

  $("#hamburger").click(function(){
    openNav();
  });

  $("#cross").click(function(){
    closeNav();
  });

  $(window).scroll(function(){
    if ($(document).scrollTop() > 10) {
      $(".nav-bar").css("box-shadow", "0 0 4px 0 #0000004C, 0 0 20px 0 #00000033");
    }
    else {
      $(".nav-bar").css("box-shadow", "none");
    }
  });

  /*** PHP Session Variable Handling ***/
  if(userID != null) {
    $("#nav-login a").text(userID);
    $("#nav-login a").attr("href", "account.php");
  }
  else {
    $("#nav-login a").text("Login");
    $("#nav-login a").attr("href", "login.php");
  }
});
