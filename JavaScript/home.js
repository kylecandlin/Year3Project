/* On Page Scroll */
$(window).scroll(function(){
  // Adjusts css for nav-bar elements depending on scoll value against container height
  if ($(document).scrollTop() > $(".top-container").height()-20) {
    $(".nav-bar").css("background", "white");
    $("#nav-menu").css("background", "white");
  }
  else {
    $(".nav-bar").css("background", "#e6f5ff");
    $("#nav-menu").css("background", "#e6f5ff");
  }
});

/* On Window Resize */
$(window).on('resize', function(){
  // Plays animation only if page is above 850px wide
  if($(document).width() < 850) {
    $("#pub-title-header").clearQueue();
  }
  else {
    $("#pub-title-header").hide();
    $("#pub-title-header").delay(600).animate({
                            opacity: 'show',
                            margin: 'show',
                            padding: 'show',
                            height: 'show'
                          }, 1000, 'swing');
  }
});
