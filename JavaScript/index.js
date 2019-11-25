$(document).ready(function(){
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
