$(document).ready(function(){
  $("#username").keyup(function(){
    var username = $(this).val();
    $.ajax({
      type:"POST",
      url:"checkValid.php",
      data:({
        username: username
      }),
      datatype: "text",
      success: function(msg){
        if(msg == 1) {
          console.log("exists");
        }
        else if (msg == 0){
          console.log("not exists");
        }
      }
    });
  });
});
