
$(document).ready(function(){
  
    function timeInEventHandler(e)
    {
        e.preventDefault();
        SubmitAjax("POST","timeIn",null,actionTimeIn)
        $('.time-in-btn').prop('disabled',true);
    } $('.time-in-btn').off('click').on('click',timeInEventHandler);

    function actionTimeIn(response)
    {
        $('.container-logBtn').html(response.btnTimeLog);
        // alert(response.message);
        $('.time-in').html(response.currentTimeIn);
        $('.time-out').html(response.currentTimeOut);

        $("#myAlert").addClass("show slideInRight");
        setTimeout(function(){
            $("#myAlert").removeClass("show slideInRight"); // Remove animation class
        }, 4000);
    }


    function timeOutEventHandler(e)
    {
        e.preventDefault();
        SubmitAjax("POST","timeOut",null,actionTimeOut);
        $('.time-out-btn').prop('disabled',true);
    }$('.time-out-btn').off('click').on('click',timeOutEventHandler);

    function actionTimeOut(response)
    {
        $('.container-logBtn').html(response.btnTimeLog);
        // alert(response.message);
        $('.time-out').html(response.currentTimeOut);
        $("#timeOut").addClass("show slideInRight");
        setTimeout(function(){
            $("#timeOut").removeClass("show slideInRight"); // Remove animation class
        }, 4000);
    }

});


function SubmitAjax(_type,_url,_data=null,func)
{
    $.ajax({
        type:_type,
        url:_url,
        data:_data,
        success:function(response)
        {
            func(response);
        },
        error:function(xhr,status,erro)
        {
            alert(xhr.responseTxt);
        }
    });
}




