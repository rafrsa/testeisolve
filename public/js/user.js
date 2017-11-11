$(document).ready(function(){

    $("#txtDatePicker").datepicker();
    $("#txtDatePicker").datepicker("option","dateFormat","yy-mm-dd");

   $("#btnNewUser").click(function(){
       window.location = basepath + 'users/new';
   });

   $("#btnSaveUser").click(function(){
       var edit = $("#hd_id").val();

       if(edit==0) {
           var txtFullname = $("#txtFullname").val();
           var txtEmail = $("#txtEmail").val();
           var txtDatePicker = $("#txtDatePicker").val();
           var txtProfile = $("#txtProfile").val();
           var txtPass = $("#txtPass").val();
           var txtRePass = $("#txtRePass").val();

           if(txtPass != txtRePass) {
               $.alert({
                   title: 'Aviso!',
                   content: 'As senhas não são iguais!',
               });
           }
           else if(txtPass.toString().length < 1 ||
               txtRePass.toString().length < 1 ||
               txtFullname.toString().length < 1 ||
               txtDatePicker.toString().length < 1 ||
               txtProfile.toString().length < 1)
           {
               $.alert({
                   title: 'Aviso!',
                   content: 'Todos os campos são de preenchimento obrigatório!',
               });
           }
           else
           {
               $.ajax({
                   url: basepath +'users/insertUser',
                   data: { txtFullname  : txtFullname
                         , txtEmail     : txtEmail
                         , txtDatePicker: txtDatePicker
                         , txtProfile   : txtProfile
                         , txtPass      : txtPass},
                   type: 'POST',
                   success: function (e) {
                       if(e) {
                           $.dialog({
                               title: 'Sucesso!',
                               content: 'Usuário inserido com sucesso!',
                               onDestroy: function () {
                                   window.location = basepath + 'users';
                               },
                           });
                       }
                       else {
                           $.alert({
                               title: 'Aviso!',
                               content: 'Ocorreu algum erro com a inserção!',
                           });
                       }
                   },
                   error: function (e) {
                   }
               });
           }
       }
       else if(edit == 1){
           var passOld = $("#hd_passOld").val();
           var userID = $("#hd_userID").val();

           var txtFullname = $("#txtFullname").val();
           var txtEmail = $("#txtEmail").val();
           var txtDatePicker = $("#hd_birthDate").val();
           var txtProfile = $("#txtProfile").val();
           var txtPass = $("#txtPass").val();
           var txtRePass = $("#txtRePass").val();

           if(txtPass != txtRePass) {
               $.alert({
                   title: 'Aviso!',
                   content: 'As senhas não são iguais!',
               });
           }
           else if(txtPass.toString().length < 1 || txtRePass.toString().length < 1)
           {
               $.alert({
                   title: 'Aviso!',
                   content: 'Os campos de senha não podem estar vazio!',
               });
           }
           else
           {
               $.ajax({
                   url: basepath +'users/updateUser',
                   data: {  txtFullname     : txtFullname
                           , txtEmail       : txtEmail
                           , txtDatePicker  : txtDatePicker
                           , txtProfile     : txtProfile
                           , txtPass        : txtPass
                           , passOld        : passOld
                           , userID         : userID},
                   type: 'POST',
                   success: function (e) {
                       if(e) {
                           $.dialog({
                               title: 'Sucesso!',
                               content: 'Usuário inserido com sucesso!',
                               onDestroy: function () {
                                   window.location = basepath + 'users';
                               },
                           });
                       }
                       else {
                           $.alert({
                               title: 'Aviso!',
                               content: 'Ocorreu algum erro com a atualização!',
                           });
                       }
                   },
                   error: function (e) {
                   }
               });
           }
       }
   });
});

function deleteUser(user_id){

    $.confirm({
        title: 'Aviso!',
        content: 'Deseja realmente remover o usuário?',
        buttons: {
            Sim: function () {
                $.ajax({
                    url: basepath +'users/deleteUser',
                    data: {user_id: user_id},
                    type: 'POST',
                    success: function (e) {
                        if(e) {
                            $.dialog({
                                title: 'Sucesso!',
                                content: 'Usuário excluído com sucesso!',
                                onDestroy: function () {
                                    window.location = basepath + 'users';
                                },
                            });
                        }
                        else {
                            $.alert({
                                title: 'Aviso!',
                                content: 'Ocorreu algum erro com a exclusão!',
                            });
                        }
                    },
                    error: function (e) {
                    }
                });
            },
            Não: function () {
            }
        }
    });
}

function editUser(user_id)
{
    window.location = basepath + 'users/edit/'+ user_id;
}

function viewUser(user_id)
{
    window.location = basepath + 'users/view/'+ user_id;
}