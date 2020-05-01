$(document).ready(function(){
  $(".register-event ul, #step-one, #step-two, #event-add, #login-request, #finish").each(function(){
    $(this).hide();
  })

  if(staffID != ''){
    $("#event-add").show();
  }

  if(staffID == '' && userID == '') {
    $("#login-request").show();
    $(".register-event, .register-event ul, #step-one, #register-attendance").each(function(){
      $(this).hide();
    });
  }

  $("#register-attendance").click(function(){
    $(this).toggle();
    $(".register-event ul").show();
    $("#step-one").show();
  });

  $("#cancel").click(function(){
    $("#finish").hide();
    $("#next").show();
    $("#step-one, #step-two, .register-event ul").each(function(){
      $(this).hide();
    });
    $("#register-attendance").show();
  });

  $("#next").click(function(){
    var dropdown = $(".dropdown span").text();
    if(dropdown.replace(/[^0-9]/g, "").length < 1) {
      $(".dropdown span").effect("bounce");
    }
    else {
      $("#step-one").toggle();
      $("#step-two").toggle();
      $(this).hide();
      $("#finish").show();
    }
  });

  $("#finish").click(function(){
    var qty = $(".dropdown span").text();

    if ($("#TandC").is(":checked")) {
      // AJAX call to run function that inserts into EventAttendance
      $.ajax({
        type: 'POST',
        url: 'eventAttend.php',
        data: {quantity: qty},
        success: function(data){
          console.log(data);
          if(data == '0'){
            $("#error-report").text("You have already registered for this event. You cannot register again.");
          }
          else if(data == '1'){
            location.replace('event.php');
          }
        }
      });
    }
    else {
      $("#error-report").text("You must read the Terms and Conditions before registering.");
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
