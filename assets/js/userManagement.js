$(document).ready(function(){


    //**SEARCH USER */
    function searchUserEventHandler(e)
    {
        e.preventDefault();
        var query = $(this).val();
        SubmitAjax('POST','search/search_user',{query:query},searchUser)
    } $('.search_employees').off('keyup').on('keyup',searchUserEventHandler);

    function searchUser(response)
    {
        $(".wrapper-employees").html(response.tbody);
    }

    //**OPENING ADD NEW USER MODAL */
    function AddUserModalEventHandler(e)
    {
        e.preventDefault();
        $("#modalActionTitle").text("Register Employee");
        SubmitAjax("POST","addUser",null,AddOpenUserModal);
    }
    $('.addUserBtn').off('click').on('click',AddUserModalEventHandler);

    function AddOpenUserModal(response)
    {
        $("#userFirstName").val("");
        $("#userLastName").val("");
        $("#userPet").val("");
        $("#userEmail").val("");
        $("#select-dept").val("0");
        $("#select-post").val("0");
        $('.con-modif-btn').html(response.registerDesign);
    }

    // ** SUBMIT ADDING A NEW USER
    $("#registerUserBtn").click(function(e){
        e.preventDefault();
        var userFormData = getDataFromForm();

        if(isFormIsFilledUp(userFormData))
        {
            if(isPasswordMatch(userFormData['password'],userFormData['confirmPass']))
            {
                if(validateEmail(userFormData['email']))
                {
                    SubmitAjax("POST","submitRegister",userFormData,SubmitNewUser);
                }
                else{
                    alert("Please input valid email!");
                }
            }
            else{
                alert("Password and confirm password is not match!");
            }
        }else{
            alert("You need to fill up all form");
        }
    });

    function SubmitNewUser(response)
    {
        if(response.status)
        {
            //alert(response.tbody);
            $(".wrapper-employees").html(response.tbody);
            $("#closeModalUser").click();
        }
        alert(response.message);
    }

    //**UPDATNG ROLE OF THE USER*/
    function EditRoleClickEventHandler(e)
    {
        e.preventDefault();
        var selectedRole = $(this).val();
        var userId = $(this).attr('name').replace('flexRadio','');

        if(selectedRole=="admin")
        {
            confirmDialog = confirm("Would you truly intend to make this user as admin?");
            if(confirmDialog)
            {
                var dataRole ={
                    'role':selectedRole
                };
                SubmitAjax("POST","users/update/" + userId + "/updateRole",dataRole,ChangeUserRole);
            }else
            {
                $("#userRadio").prop('checked', true);
            }
        }
        else{
            confirmDialog = confirm("Would you truly intend to make this admin as user?");
            if(confirmDialog)
            {
                var dataRole ={
                    'role':selectedRole
                };
                SubmitAjax("POST","users/update/" + userId + "/updateRole",dataRole,ChangeUserRole);
            }else
            {
                $("#adminRadio").prop('checked', true);
            }
        
        }
    }
    $('input[type=radio][name^=flexRadio]').off('change').on('change',EditRoleClickEventHandler);

    function ChangeUserRole(response)
    {
        alert("Role update successfuly!");
    }



    //**OPENING MODAL FOR EDIT USER*/
    function EditUserEventHandler(e)
    {
        e.preventDefault();
        var userId ={
            'id':$(this).val()
        };
        $("#modalActionTitle").text("Edit Employee Data");
        SubmitAjax("POST","editUser",userId,OpenModalEditUser);
    } 
    $('.edit-user').off('click').on('click',EditUserEventHandler);

    function OpenModalEditUser(response)
    {
        $("#userFirstName").val(response.userInfo['firstName']);
        $("#userLastName").val(response.userInfo['lastName']);
        $("#userPet").val(response.userInfo['pet']);
        $("#userEmail").val(response.userInfo['email']);
        $("#select-dept").val(response.userInfo['department']);
        $("#select-post").val(response.userInfo['position']);
        $('.con-modif-btn').html(response.submitChanges);
    }

    //**SUBMIT CHANGES IN THE INFORMATION OF THE USER */
    $('.userEditBtn').click(function(e){
        e.preventDefault();
        var userId = this.value;
        userFormData = {
            'id':userId,
            'firstName': $("#userFirstName").val(),
            'lastName': $("#userLastName").val(),
            'pet': $("#userPet").val(),
            'email':$("#userEmail").val(),
            'department': $('#select-dept').val(),
            'position': $('#select-post').val()
        };
            SubmitAjax("POST","submitEditUser",userFormData,submitEditUserChanges)
    });

    function submitEditUserChanges(response)
    {
        $(".wrapper-employees").html(response.tbody);
        $("#closeModalUser").click();
    }
    
    //! DELETE A USER */
    // function deleteUserEventHandler(e)
    // {
    //     e.preventDefault();
    //     confirmDialog = confirm("Are you sure you want to permanent delete this employee?");
    //     if(confirmDialog)
    //     {
    //     var id = $(this).val();
    //     $("#"+id).fadeOut(600,function(){
    //         $(this).remove();
    //         SubmitAjax("DELETE","/users/confirmDelete/"+ id,null,deleteUser)
    //     });
    //     }
    // } $('.confirm-delete').off('click').on('click',deleteUserEventHandler);

    // function deleteUser($response)
    // {
    //     //alert($response);
    // }

    function deleteUserEventHandler(e)
    {
        var id = $(this).val();
        var userData = {
            'id':id
        };
        confirmDialog = confirm("Are you sure you want to permanent delete this employee?");
        if(confirmDialog)
        {
        $("#"+id).fadeOut(600,function(){
            $(this).remove();
            SubmitAjax("POST","delete_user",userData,deleteUser);
        });
        }
    } $('.confirm-delete').off('click').on('click',deleteUserEventHandler);

    function deleteUser($response)
    {
        alert("Deleted successfully");
    }


    //** HANDLE SORTING IN PROGILE TAB */
    function sortUserEventHandler(e){
        e.preventDefault();
        var employeesData = $("#employees-data").data('employees');
        var jsonData = {
            'employees':JSON.stringify(employeesData)
        };

        //alert(jsonData['employees']);

        var value = $(this).val();
        SubmitAjax('POST','sort_user_by/'+value,jsonData,sortUser);
    } $('#sortUsers').off('change').on('change',sortUserEventHandler);

    function sortUser(response)
    {
        //$(".wrapper-employees").html(response.tbody);
        console.log(response);
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


function validateEmail(email){
   var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
   return regex.test(email);
}

function updateRole(message,userId,selectedRole,radio)
{
    confirmDialog = confirm(message);
    if(confirmDialog)
    {
        $.ajax({
            url: "users/update/" + userId + "/updateRole",
            type: 'POST',
            data: {
                'role' : selectedRole
            },
            success:function(response)
            {
                alert("Role update successfuly!");
            },
            error: function(xhr,status,error)
            {
                alert(xhr.respnseText+'updateuser');
            }
        });
    }else
    {
        $("#"+radio).prop('checked', true);
    }
}

function getDataFromForm()
{
    return userFormData = {
        'firstName': $("#userFirstName").val(),
        'lastName': $("#userLastName").val(),
        'pet': $("#userPet").val(),
        'email':$("#userEmail").val(),
        'password': $("#userPassword").val(),
        'confirmPass':$("#userConfirmPass").val(),
        'department': $('#select-dept').val(),
        'position': $('#select-post').val()
    };
}

function isFormIsFilledUp(userFormData)
{
    if(userFormData['firstName']==""||userFormData['lastName']==""||
    userFormData['pet']==""||userFormData['email']==""||userFormData['password']==""||
    userFormData['confirmPass']=="")
    {
        return false;
    }

    return true;
}

function isPasswordMatch(password,confPass)
{
    return password==confPass?true:false;
}
