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

$(document).ready(function(){
  if($(document).width < 850) {
    $("#pub-title-header").hide();
  }
  else {
    $("#pub-title-header").hide();

    $("#pub-title-header").delay(600).animate({
                            opacity: 'show',      // animate slideUp
                            margin: 'show',
                            padding: 'show',
                            height: 'show'
                          }, 1000, 'swing'); // height: 0, opacity: 0
  }
});
