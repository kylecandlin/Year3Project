$("document").ready(function(){
  /*** Variable Declaration ***/
  // Bool variables for submit button
  var lenCheckBool = false;
  var charCheckBool = false;
  var numCheckBool = false;

  // Elements to display criteria to be met by user
  var $lenCheck = $("<p/>").addClass("validCheck");
  var $charCheck = $("<p/>").addClass("validCheck");
  var $numCheck = $("<p/>").addClass("validCheck");
  $("#passwordCheck").append($lenCheck, $charCheck, $numCheck);

  $("#submit-button").attr('disabled', true);
  $("#submit-button").css('background', 'grey');

  /*** Functions ***/
  // Checks password length
  function passwordLenCheck(password){
    if (password.length < 8) {
      $($lenCheck).text("Must be at least 8 characters long.");
      lenCheckBool = false;
    }
    else {
      $($lenCheck).text("");
      lenCheckBool = true;
    }
  }

  // Checks password for capital letters
  function passwordCharCheck(password){
    if (password.replace(/[^A-Z]/g, "").length < 1) {
      $($charCheck).text("Must include a capital letter.");
      charCheckBool = false;
    }
    else {
      $($charCheck).text("");
      charCheckBool = true;
    }
  }

  // Checks password for numbers
  function passwordNumCheck(password){
    if (password.replace(/[^0-9]/g, "").length < 1) {
      $($numCheck).text("Must include a number.");
      numCheckBool = false;
    }
    else {
      $($numCheck).text("");
      numCheckBool = true;
    }
  }

  // Checks age
  /*function ageCheck(dob){
    var today = new Date().format('m-d-Y');

    var diff_ms = Date.now() - dob.getTime();
    var age_dt = new Date(diff_ms);

    return Math.abs(age_dt.getUTCFullYear() - 1970);

    if ((age-today) < 18){
      $("#dobCheck").text("Must include a number.");
      numCheckBool = false;
    }
    else {

    }
  }*/

  // Checks that all criteria is met so prfile can be created
  function buttonClickable(){
    console.log("Password:" +  "\n" + ""
                  +  "\n" + "Length: " + lenCheckBool
                  +  "\n" + "Capital: " + charCheckBool
                  +  "\n" + "Number: " + numCheckBool
                  +  "\n" + "");

    if (lenCheckBool && charCheckBool && numCheckBool){
      $("#submit-button").attr('disabled', false);
      $("#submit-button").css('background',
        'linear-gradient(rgba(51, 133, 255, 0.7), rgba(51, 133, 255, 0.9))');
    }
    else {
      $("#submit-button").attr('disabled', true);
      $("#submit-button").css('background', 'grey');
    }
  }

  // AJAX call that is called when the password field changes
  $("#password").keyup(function(){
    var password = $(this).val();

    $.ajax({
      type:"POST",
      data:({
        password: password
      }),
      datatype: "text",
      success: function(){
        passwordLenCheck(password);
        passwordCharCheck(password);
        passwordNumCheck(password);
        buttonClickable();
      }
    });
  });
});
