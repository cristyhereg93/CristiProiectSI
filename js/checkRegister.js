$(document).ready(function () {
    var checked = {'email1' : 0, 'password1': 0};

    $('#r_password').keyup(function () {
        var val = $(this).val();
        if (val != $('#password').val()) {
            checked['password1'] = 0;
            $('#r_password').addClass('error');
            $('#ERRpassword2').html('<font color="red">Passwords must match !</font>');
        } else {
            checked['password1'] = 1;
            $('#r_password').removeClass('error');
            $('#ERRpassword2').html('<font color="green">Passwords must match !</font>');
        }
    });
    
    $('#username').focusout(function(){
        var params = {'username' : $(this).val() };
        $.ajax({
            url : "checkUsername.php",
            datatype : 'html',
            type : 'POST',
            data : params,
            success : function(data){
                if (data == 1)
                {
                    checked['email1'] = 0;
                    $('#email').addClass('error');
                    $('#ERRemail1').html('<font color="red">Username is available !</font>');
                }else{
                    checked['email1'] = 1;
                    $('#email').removeClass('error');
                    $('#ERRemail1').html('<font color="green">Username is available !</font>');
                }
                
            }
        });
    })

    $('#password,#r_password').keyup(function () {
        if (checked['password1'] == 1 && checked['email1'] == 1)
        {
            $('#submitButton').removeAttr('disabled');
        } else {
            $('#submitButton').attr('disabled', 'true');
        }
    });
});