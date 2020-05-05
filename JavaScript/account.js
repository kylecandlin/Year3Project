$(document).ready(function(){
  // On page load, show account-info and hide event-info
  $("#account-info").show();
  $("#event-info").hide();

  // If account button clicked, show account info
  $("#account-btn").click(function(){
    $("#account-info").show();
    $("#event-info").hide();
  });

  //If event button clicked, show event-info
  $("#event-btn").click(function(){
    $("#account-info").hide();
    $("#event-info").show();
  });
});
