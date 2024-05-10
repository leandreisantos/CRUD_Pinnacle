$(document).ready(function(){

    //** OPEN MODAL FOR ADDING POSITION */
    function addPostModalClickHandler(e)
    {
        e.preventDefault();
        SubmitAjax("POST","addPosition",null,ModalPost);
    }
    $('.postDeptBtn').off('click').on('click',addPostModalClickHandler);

    
    //** SUBMIT NEW POSITION */
    $('.positionBtn').click(function(e){
        e.preventDefault();
        var positionData = {
            'position':$("#positionName").val()
        };
        if(!positionData['position']=="")
        {
            SubmitAjax("POST","submitPosition",positionData,SubmitPost);
        }
        else{
            alert("You need to add name of position.");
        }
    });

    //** OPEN EDIT MODAL POSITION */
    function editPostModalClickHandler(e)
    {
        e.preventDefault();
        var postId = {
            'id': $(this).data('value1')
        };
        SubmitAjax("POST","editPosition",postId,ModalEditPost);
    }

    $('.edit-post').off('click').on('click',editPostModalClickHandler);

    //** SUBMIT CHANGES IN EDIT MODAL */
    $('.positionEditBtn').click(function(e){
        e.preventDefault();
        var postId = this.value;
        var newPostName = $('.positionName').val();

        if(!newPostName == "")
        {
            var positionData = {
                'id':postId,
                'name': newPostName
            };

            SubmitAjax("POST","submitEditPosition",positionData,SubmitEditPost);
        }
        else{
            alert("Name of position is required");
        }
    });

    //! EDIT POSITION
    function deletePostEventHandler()
    {
        var postId = {
            'id': $(this).data('value1')
        };
        var postName = $(this).data('value2');

        confirmDialog = confirm("Are you sure you want to permanent delete this "+postName+" position?");
        if(confirmDialog)
        {
          $("#"+postId['id']).fadeOut(600,function(){
             $(this).remove();
             
             SubmitAjax("POST","deletePosition",postId,DeletePost);
          });
        }
    }
    $('.delete-post').off('click').on('click',deletePostEventHandler);

        //** HANDLE SORTING IN POSITION TAB */
        function sortPostEventHandler(e){
            e.preventDefault();
            var value = $(this).val();
            SubmitAjax('GET','sort_position_by/'+value,null,sortPosition);
        } $('#sortPost').off('change').on('change',sortPostEventHandler);
    
        function sortPosition(response)
        {
            $("tbody").html(response.tbody);
        }
});

//** METHOD UTILITIES */
function ModalPost(response)
{
    $('.positionName').val("");
    $('.container-edit-btn').html(response.proceedBtn);
}


function SubmitPost(response)
{
    if(response.status)
    {
        alert(response.message);
        $("tbody").html(response.tbody);
        $("#closeModalPost").click();
    }
    else
    {
        alert(response.message);
    }
}

function ModalEditPost(response)
{
    $('.positionName').val(response.postName);
    $('.container-edit-btn').html(response.proceedBtn);
}

function SubmitEditPost(response)
{
    alert(response.message);
    $("tbody").html(response.tbody);
    $("#closeModalPost").click();
}

function DeletePost(response)
{
    alert(response.message);
}


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

