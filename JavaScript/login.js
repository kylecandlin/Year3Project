$(document).ready(function(){
  $("#password").keyup(function(){
    var password = $(this).val();
    $.ajax({
      type:"POST",
      url:"JavaScript/checkValid.php",
      data:({
        username: password
      }),
      datatype: "text",
      success: function(msg){
        if(msg == 'length') {
          console.log("Length");
        }
        else if (msg == 'capital'){
          console.log("capital");
        }
        else if (msg == 'number'){
          console.log("number");
        }
        else if (msg == 0) {
          console.log('');
        }
      }
    });
  });
});
