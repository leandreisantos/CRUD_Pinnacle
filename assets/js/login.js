$(document).ready(function(){
    function loginEventHandler(e)
    {
        e.preventDefault();
        var data=getDataFromForm();

        if(data['email'] == "")
        {
            alert("Email is required.");
        }
        if(data['password'] == "")
        {
            alert("Password is required.");
        }
        else
        {
            if(validateEmail(data['email']))
            {     
                proceedLogin(data);

            }else{
                alert("Please input valid email");
            }
        }
    }$('#login-btn').off('click').on('click',loginEventHandler);

});


function getDataFromForm()
{
    var data = {
        'email': $("#userEmail").val().trim(),
        'password':$("#userPassword").val().trim(),
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
                alert(response.message);
            }
        },
        error: function(xhr,status,error)
        {
            alert(xhr.respnseText);
        }
    });
}
