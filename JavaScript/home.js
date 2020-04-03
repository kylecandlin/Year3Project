$(window).scroll(function(){
  if ($(document).scrollTop() > $(".top-container").height()-20) {
    $(".nav-bar").css("background", "white");
    $("#nav-menu").css("background", "white");
  }
  else {
    $(".nav-bar").css("background", "#e6f5ff");
    $("#nav-menu").css("background", "#e6f5ff");
  }
});
