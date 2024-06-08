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
            validateEmail(data['email']) ? proceedLogin(data) : $('.error-message-email').removeClass('visually-hidden');
        }
    }$('#login-btn').off('click').on('click',loginEventHandler);

    $('.toggle-password').click(function(){

        const passwordField = $('.inputPass');
        const toggleIcon = $('.toggle-password');
        const slashEye = 'bi bi-eye-slash';
        const eye = 'bi bi-eye';

        if($(this).hasClass(slashEye)){
            togglePasswordVisibilty(toggleIcon,eye,slashEye,'Hide Password',passwordField,'text');
        }
        else if($(this).hasClass(eye)){
            togglePasswordVisibilty(toggleIcon,slashEye,eye,'Show Password',passwordField,'password');
        }
    });

    $('#liveToastBtn').click(function(){
        $('.toast').toast('show');
    });

});

function togglePasswordVisibilty(toggleIcon,Addicon,removeIcon,
                                 title,passwordField,type){
    toggleIcon.removeClass(removeIcon);
    toggleIcon.addClass(Addicon);
    toggleIcon.attr('title',title);
    passwordField.attr('type',type);
}


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
