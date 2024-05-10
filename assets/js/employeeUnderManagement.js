$(document).ready(function(){
    $('.edit-under-emp').click(function(){
        alert('click');
    });

    function inputDeptEventHandler(e)
    {
        e.preventDefault();
        var inputValue = $(this).val();
        
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
