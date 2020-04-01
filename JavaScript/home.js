$(window).scroll(function(){
  if ($(document).scrollTop() > 680) {
    $(".nav-bar").css("background", "white");
  }
  else {
    $(".nav-bar").css("background", "rgb(230, 245, 255)");
  }
});
