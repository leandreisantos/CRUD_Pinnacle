$(document).ready(function(){

    //For enable edit in profile tab
    function enableEditEventHandler(e){
        e.preventDefault();
        SubmitAjax('POST','edit-profile-tab','',enableEdit);
    }$('.enable-edit').off('click').on('click',enableEditEventHandler);

    function enableEdit(response)
    {
        handledInput(response.inputDisabled,'black');
        $('.button-container').html(response.buttonForEdit);
    }

    //For cancel enable edit
     $('.cancel').click(function(e){
        e.preventDefault();
        handledInput(true,'#707070');
        $('.button-container').html('');
        $('.enable-edit').on('click');
     });

     function saveChangesEventHandler(e){
        e.preventDefault();
        var dataForm={
            'firstName':$('#firstName').val(),
            'lastName': $('#lastName').val(),
            'pet':$('#pet').val()
        };

        if(dataForm.firstName==""){
            alert('First Name is required.');
        } 
        if(dataForm.lastName==''){
            alert('Last Name is required.');
        } 
        if(dataForm.pet==''){
            alert('Pet is required.');
        } 
        else if (!dataForm.firstName==""&&!dataForm.lastName==""&&!dataForm.pet==""){
            SubmitAjax('POST','save_changes',dataForm,saveChanges);
        }
 
        
     }$('.save-changes').off('click').on('click',saveChangesEventHandler);
     function saveChanges(response)
     {
        handledInput(true,'#707070');
        $('.button-container').html('');
        $('.enable-edit').on('click');

        $("#myAlert").addClass("show slideInRight");
        setTimeout(function(){
            $("#myAlert").removeClass("show slideInRight"); // Remove animation class
        }, 4000);
     }

});



function validateInput(data)
{
    var errors=[];

    if(!data.firstName.trim()){
        errors.push('First Name is required.');
    }
    if(!data.lastName.trim()){
        errors.push('Last Name is required.');
    }
    if(!data.pet.trim()){
        errors.push('Pet is required.');
    }

    return errors;
}



function handledInput(response,textColor)
{
    $('#firstName').prop('disabled',response).css('color',textColor);
    $('#lastName').prop('disabled',response).css('color',textColor);
    $('#pet').prop('disabled',response).css('color',textColor);
}

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