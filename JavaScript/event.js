$(document).ready(function(){
  $("#submit-button").hide();

  if(staffID != null){
    $("#submit-button").show();
  }
  else {
    $("#submit-button").hide();
  }
});
