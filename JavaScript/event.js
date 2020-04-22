$(document).ready(function(){
  $(".register-event").show();
  $(".register-event ul, #step-one, #step-two").each(function(){
    $(this).hide();
  })

  if(staffID != null){
    $("#submit-button").show();
  }
  else {
    $("#submit-button").hide();
  }

  $("#register-attendance").click(function(){
    $(this).toggle();
    $(".register-event ul").show();
    $("#step-one").show();
  });

  $("#cancel").click(function(){
    $("#next").text("Next");
    $("#step-one, #step-two, .register-event ul").each(function(){
      $(this).hide();
    });
    $("#register-attendance").show();
  });

  $("#next").click(function(){
    var nextText = $(this).text();
    if(nextText == "Next") {
      var dropdown = $(".dropdown span").text();
      if(dropdown.replace(/[^0-9]/g, "").length < 1) {
        $(".dropdown span").effect("bounce");
      }
      else {
        $("#step-one").toggle();
        $("#step-two").toggle();
        $("#next").text("Finish");
      }
    }
    else {
      $(this).click(function(){
      });
    }
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
