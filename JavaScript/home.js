$(window).scroll(function(){
  if ($(document).scrollTop() > 680) {
    $(".nav-bar").css("background", "white");
    $("#nav-button li a").css("border-bottom", "1px white solid");
  }
  else {
    $(".nav-bar").css("background", "rgb(230, 245, 255)");
    $("#nav-button li a").css("border-bottom", "1px rgb(230, 245, 255) solid");
  }
});
