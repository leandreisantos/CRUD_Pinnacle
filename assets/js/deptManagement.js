$(document).ready(function()
{
    //** Open Add modal for add department */
    function addDeptModalHandler(e)
    {
        e.preventDefault();
        $("#title-edit-modal").text("Add Department");
        SubmitAjax("POST","addDepartment",null,ModalAddDept);
    }
    $('.addDeptBtn').off('click').on('click',addDeptModalHandler);

    function ModalAddDept(response)
    {
        $('.departmentName').val("");
        $('.container-edit-btn').html(response.proceedBtn);
    }

    //** Submit new department */
    $('.departmentBtn').click(function(e){
        e.preventDefault();
        var departmentData = {
            'department': $("#departmentName").val(),
            'head_id' : $("#select-head").val()
        };
        if(!departmentData['department']=="")
        {
            SubmitAjax("POST","submitDepartment",departmentData,submitNewDept);
        }else{
            alert("You need to add name of department.");
        }
    });

    function submitNewDept(response)
    {
        if(response.status)
        {
            alert(response.message);
            $("tbody").html(response.tbody);
            $("#closeModalDept").click();
        }
        else
        {
            alert(response.message);
        }
    }

    //**Open Edit Department Modal */
    function editDeptModalHandler(e)
    {
        e.preventDefault();
        var deptId = {
            'id': $(this).data('value1')
        };
        $("#title-edit-modal").text("Edit Department");
        SubmitAjax("POST","editDepartment",deptId,ModalEditDept);
    }
    $('.edit-dept').off('click').on('click',editDeptModalHandler);


    function ModalEditDept(response)
    {
        $('.departmentName').val(response.deptName);
        $('#select-head').val(response.head_id);
        //alert(response.head_id);
        $('.container-edit-btn').html(response.proceedBtn);
    }

    //** Submit changes of edited department */
    $('.departmentEditBtn').click(function(e){
        e.preventDefault();
        var deptId = this.value;
        var newDeptName = $('.departmentName').val();
        var headDept = $("#select-head").val()

        if(!newDeptName == "")
        {
            var departmentData = {
                'id':deptId,
                'name': newDeptName,
                'head_id':headDept
            };
            SubmitAjax('POST','submitEditDepartment',departmentData,SubmitEditedDept);
        }
        else{
            alert("Name of department is required");
        }
    });

    function SubmitEditedDept(response)
    {
        alert(response.message);
        $("tbody").html(response.tbody);
        $("#closeModalDept").click();
    }
    
    //! EDIT DEPARTMENT

    function deleteDeptEventHandler()
    {
        var departmentData = {
            'id':$(this).data('value1')
        };
        var deptName = $(this).data('value2');

        confirmDialog = confirm("Are you sure you want to permanent delete this "+deptName+" department?");
        if(confirmDialog)
        {
        $("#"+departmentData['id']).fadeOut(600,function(){
            $(this).remove();
            SubmitAjax("POST","deleteDepartment",departmentData,DeleteDept);
        });
        }
    }
    $('.delete-dept').off('click').on('click',deleteDeptEventHandler);

    function DeleteDept(response)
    {
        alert(response.message);
    }


    //** HANDLE SORTING IN PROGILE TAB */
    function sortDeptEventHandler(e){
        e.preventDefault();
        var value = $(this).val();
        SubmitAjax('GET','sort_dept_by/'+value,null,sortDept);
    } $('#sortDept').off('change').on('change',sortDeptEventHandler);

    function sortDept(response)
    {
        $("tbody").html(response.tbody);
    }

});


//** FUNCTION FOR SUBMITTING AJAX TO SERVER */
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