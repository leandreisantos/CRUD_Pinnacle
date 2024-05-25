$(document).ready(function(){
    function loginEventHandler(e)
    {
        e.preventDefault();
        var data=getDataFromForm();

        //Function to handle email and password validation
        handleFieldValidation(data['email'],'.email-icon-error','.inputEmail');
        handleFieldValidation(data['password'],'.pass-icon-error','.inputPass');

        if(data['password']!=""&&data['email']!="")
        {
            if(validateEmail(data['email'])){     
                proceedLogin(data);
            }else{
                $('.error-message-email').removeClass('visually-hidden');
            }
        }
    }$('#login-btn').off('click').on('click',loginEventHandler);

});


//Function to handle validation for a single field
function handleFieldValidation(value,iconSelector,inputSelector){
    if(value == ""){
        $(iconSelector).removeClass('visually-hidden');
        $(inputSelector).addClass('error');
    } else {
        $(iconSelector).addClass('visually-hidden');
        $(inputSelector).removeClass('error');
    }
}


function getDataFromForm()
{
    var data = {
        'email': $("#userEmail").val().replace(/\s/g,''),
        'password':$("#userPassword").val().replace(/\s/g,''),
    }
    return data;
}

function validateEmail(email){
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);
}

function proceedLogin(data)
{
    $.ajax({
        type: 'POST',
        url: 'login/processLogin',
        data: data,
        success:function(response)
        {     
            if(response.status)
            {
                alert(response.message);
                location.reload();
                $('#successToast').toast('show');
            }else{
                if(response.message=="Email not found"){
                    $('.error-message-email').text("Email not found");
                    $('.error-message-email').removeClass("visually-hidden");
                }
                if(response.message == "Password is incorrect"){
                    $('.error-message-pass').text("Password is incorrect");
                    $('.error-message-pass').removeClass("visually-hidden");
                }
                
            }
        },
        error: function(xhr,status,error)
        {
            alert(xhr.respnseText);
        }
    });
}
