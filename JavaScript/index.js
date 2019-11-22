$(document).ready(function(){
  $("#cross").hide();
  $("#nav-menu").hide();
  $("#hamburger").click(function() {
    $("#nav-menu").slideToggle("slow");
    $("#hamburger").hide();
    $("#cross").show();
  });

  $("#cross").click(function() {
    $("#nav-menu").slideToggle("slow");
    $("#cross").hide();
    $("#hamburger").show();
  });
});
