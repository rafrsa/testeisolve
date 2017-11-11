$(document).ready(function(){
   $("#btnLogin").click(function(){
       var email = $("#inputEmail").val();
       var pass = $("#inputPassword").val();

       if(email.toString().length < 1 || pass.toString().length < 1) {
           $("#errorLogin").hide();
           $("#errorLogin_blank").show();
           return false;
       }

       $.ajax({
           url: basepath +'login/userValidate',
           data: { email: email, pass: pass},
           type: 'POST',
           success: function (e) {
               if(e==1) {
                   window.location = basepath + 'users';
               }
               else if(e==2 || e==3){
                   $("#errorLogin").show();
                   $("#errorLogin_blank").hide();
               }
           },
           error: function (e) {
           }
       });
   });

   $("#btnLogout").click(function(){
       window.location = "/logout";
   });
});