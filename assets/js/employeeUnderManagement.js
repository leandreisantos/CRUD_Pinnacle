$(document).ready(function(){
    $('.edit-under-emp').click(function(){
        var firstName = $(this).find("i").data("value");
        var lastName = $(this).find('i').data("last-name");
        var email = $(this).find('i').data('email');
        var position = $(this).find('i').data("position");
        var department = $(this).find('i').data('department');
        var role =  $(this).find('i').data('role');

        $('.name').text(firstName+" "+lastName);
        $('.email').text(email);
        $('.position').text(position);
        $('.department').text(department);
        $('.role').text(role);
    });

    function inputDeptEventHandler(e)
    {
        e.preventDefault();
        var inputValue =this.value;
        
        $.ajax({
            type:'POST',
            url:'show_under_employee/'+inputValue,
            success:function(response)
            {
                $('.tbodyUnder').html(response.tbodyUnder);

                //console.log(response.datapass);
            },
            error:function(xhr,status,erro)
            {
                alert(xhr.responseTxt);
            }
        });
    }

    $('#deptList').off('change').on('change',inputDeptEventHandler);

});
