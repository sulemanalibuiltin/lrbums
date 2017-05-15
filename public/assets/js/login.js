/*$(document).ready(function() {
    $('#login-form').validate({

        focusInvalid: false,
        ignore: "",
        rules: {
            txtusername: {
                minlength: 2,
                required: true
            },
            txtpassword: {
                required: true,
            }
        },

        invalidHandler: function (event, validator) {
            //display error alert on form submit
        },

        errorPlacement: function (label, element) { // render error placement for each input type
            $('<span class="error"></span>').insertAfter(element).append(label)
            var parent = $(element).parent('.input-with-icon');
            parent.removeClass('success-control').addClass('error-control');
        },

        highlight: function (element) { // hightlight error inputs

        },

        unhighlight: function (element) { // revert the change done by hightlight

        },

        success: function (label, element) {
            var parent = $(element).parent('.input-with-icon');
            parent.removeClass('error-control').addClass('success-control');
        },
        submitHandler: function(form) {
            form.submit();
        }
    });

});*/




$(document).ready(function ()
{


    /*$('#checkbox-showpassword').click(function () {

     var type=$(this).is(":checked")? "text" : "password";
     $('#password').attr('type', type);


     });*/




    $('#login-form').submit(function () {
        var username=$('#username').val();
        var password=$('#password').val();

        if(username.length == 0)
        {
            $('.text-center').html('<div style="margin-right: -5px; margin-left: -5px; margin-top: 0px; margin-bottom: 15px;" class="alert alert-danger alert-dismissable fade in">' +
                ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                '<span class="font-13">Type your Username</span>'+
                '</div>');
            return false;
        }
        else if(password.length == 0)
        {
            $('.text-center').html('<div style="margin-right: -5px; margin-left: -5px; margin-top: 0px; margin-bottom: 15px;" class="alert alert-danger alert-dismissable fade in">'+
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>'+
                '<span class="font-13">Type your Password</span>'+
                '</div>');
            return false;
        }




    });






});




