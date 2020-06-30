$("document").ready(function(){
  /*** Variable Declaration ***/
  // Bool variables for submit button
  var lenCheckBool = false;
  var charCheckBool = false;
  var numCheckBool = false;
  var ageCheckBool = false;

  // Elements to display criteria to be met by user
  var $lenCheck = $("<p/>").addClass("validCheck");
  var $charCheck = $("<p/>").addClass("validCheck");
  var $numCheck = $("<p/>").addClass("validCheck");
  $("#passwordCheck").append($lenCheck, $charCheck, $numCheck);

  $("#submit-button").attr('disabled', true);
  $("#submit-button").css('background', 'grey');

  /*** Functions ***/
  /** Password Functions **/
  // Checks length
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

  // Checks for capital letters
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

  // Checks for numbers
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

  // Checks age is >= 18
  function ageCheck(dob){

    // setting dates
    dob = new Date(dob);
    var today = new Date(Date.now());

    // calculates dates and sets result as a date
    var yearsDiff = today - dob;
    yearsDiff = new Date(yearsDiff)

    // calculates year difference using milliseconds counted from 01/01/1970 00:00:00 UTC
    var age = Math.abs(yearsDiff.getUTCFullYear() - 1970);
    console.log("Age: " + age);

    if (age < 18){
      $("#dobCheck").text("You must be over 18 to use this site.");
      ageCheckBool = false;
    }
    else {
      $("#dobCheck").text("");
      ageCheckBool = true;
    }
  }

  // Checks that all criteria is met so profile can be created
  function buttonClickable(){

    // log to show bool values
    console.log("Password:" +  "\n" + ""
                  +  "\n" + "Length: " + lenCheckBool
                  +  "\n" + "Capital: " + charCheckBool
                  +  "\n" + "Number: " + numCheckBool
                  +  "\n" + "Age: " + ageCheckBool
                  +  "\n" + "");

    if (lenCheckBool && charCheckBool && numCheckBool && ageCheckBool){
      $("#submit-button").attr('disabled', false);
      $("#submit-button").css('background',
        'linear-gradient(rgba(51, 133, 255, 0.7), rgba(51, 133, 255, 0.9))');
    }
    else {
      $("#submit-button").attr('disabled', true);
      $("#submit-button").css('background', 'grey');
    }
  }

  // AJAX call that is called when the password or age field changes
  $("#password, #DOB").each(function(){
    $(this).keyup(function(){
      var password = $("#password").val();
      var dob = $("#DOB").val();

      $.ajax({
        type:"POST",
        datatype: "text",
        success: function(){
          passwordLenCheck(password);
          passwordCharCheck(password);
          passwordNumCheck(password);
          ageCheck(dob);
          buttonClickable();
        }
      });
    });
  });
});
