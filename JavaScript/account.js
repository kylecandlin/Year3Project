$(document).ready(function(){
  $("#account-info").show();
  $("#event-info").hide();

  $("#account-btn").click(function(){
    $("#account-info").show();
    $("#event-info").hide();
  });

  $("#event-btn").click(function(){
    $("#account-info").hide();
    $("#event-info").show();
  });
});
