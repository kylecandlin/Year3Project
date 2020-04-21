$(document).ready(function(){
  $("#submit-button").hide();
  $(".dropdown").hide();

  if(staffID != null){
    $("#submit-button").show();
  }
  else {
    $("#submit-button").hide();
  }

  $("#register-attendance").click(function(){
    $(this).attr("Value", "Cancel");
    $(".dropdown").toggle();
  });

  /*Dropdown Menu*/
  $('.dropdown').click(function () {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $('.dropdown-menu').slideToggle(300);
  });

  $('.dropdown').focusout(function () {
    $(this).removeClass('active');
    $('.dropdown-menu').slideUp(300);
  });

  $('.dropdown .dropdown-menu li').click(function () {
    $('.dropdown span').text($(this).text());
  });
});
