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

  // Checks password length
  function passwordLenCheck(password){
    if (password.length < 8) {
      $($lenCheck).text("Must be at least 8 characters long.");
      lenCheckBool = false;
    }
    else if (password.length = 0) {
      $($lenCheck).text("Please enter a username.");
      lenCheckBool = false;
    }
    else {
      $($lenCheck).text("");
      lenCheckBool = true;
    }
  }

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

  function buttonClickable(){
    console.log(lenCheckBool);
    console.log(charCheckBool);
    console.log(numCheckBool);

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

  $("#password").keyup(function(){
    var password = $(this).val();

    $.ajax({
      type:"POST",
      data:({
        username: password
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
