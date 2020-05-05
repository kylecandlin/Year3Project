$(document).ready(function(){
  // Hide elements on page load
  $(".register-event ul, #step-one, #step-two, #event-add, #login-request, #finish").each(function(){
    $(this).hide();
  })

  // If logged in as staff, show button
  if(staffID != ''){
    $("#event-add").show();
  }

  // If not logged in, show login request, hide evenything else.
  if(staffID == '' && userID == '') {
    $("#login-request").show();
    $(".register-event, .register-event ul, #step-one, #register-attendance").each(function(){
      $(this).hide();
    });
  }

  // If button clicked, toggle this and show next steps
  $("#register-attendance").click(function(){
    $(this).toggle();
    $(".register-event ul").show();
    $("#step-one").show();
  });

  // If button clicked
  $("#cancel").click(function(){
    $("#next").show();
    // Hide elements
    $("#step-one, #step-two, .register-event ul, #finsih").each(function(){
      $(this).hide();
    });
    // Show elements
    $("#register-attendance, #next..").each(function(){
      $(this).show();
    });
  });

  // If button clicked
  $("#next").click(function(){
    var dropdown = $(".dropdown span").text();
    // Check selectbox text, if valid toggle next step else prevent next step
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

  // On button click
  $("#finish").click(function(){
    var qty = $(".dropdown span").text();

    // If the checkbox is checked
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
    // Else, must read T&C's
    else {
      $("#error-report").text("You must read the Terms and Conditions before registering.");
    }
  });

  // Id dropdown clicked, make active
  $('.dropdown').click(function () {
    $(this).attr('tabindex', 1).focus();
    $(this).toggleClass('active');
    $('.dropdown-menu').slideToggle(300);
  });

  // If focused out of dropbox, make un-active
  $('.dropdown').focusout(function () {
    $(this).removeClass('active');
    $('.dropdown-menu').slideUp(300);
  });

  // If option clicked, assign value to selectbox span
  $('.dropdown .dropdown-menu li').click(function () {
    $('.dropdown span').text($(this).text());
  });
});
