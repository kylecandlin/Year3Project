$(document).ready(function(){
  $(window).scroll(function(){
      if ($(document).scrollTop() > 10) {
        $(".nav-bar").css("box-shadow", "0 0 4px 0 rgba(0, 0, 0, 0.25), 0 0 20px 0 rgba(0, 0, 0, 0.19)");
      }
      else {
        $(".nav-bar").css("box-shadow", "none");
      }
  });

  $("#hamburger").click(function() {
    $("#nav-menu").slideToggle("slow");
    $("#hamburger").hide();
    $("#pub-title").fadeToggle("slow");
    $("#cross").show();
  });

  $("#cross").click(function() {
    $("#nav-menu").slideToggle("slow");
    $("#cross").hide();
    $("#hamburger").show();
    $("#pub-title").fadeToggle("slow");
  });
});
