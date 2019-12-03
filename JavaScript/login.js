$(document).ready(function(){
  $("#submit-button").click(function(){
    var username = $("#Username").val();
    var password = $("#Password").val();
    userLogin(username, password);
  });

  function userLogin(username, password){
    $.ajax({
      url:"userLogin.php",
      method: "POST",
      data:{
        username: username,
        password: password
      }
    });
  }
});
